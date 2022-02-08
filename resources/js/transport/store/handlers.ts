import * as R from 'ramda'
import {Client, Shipment, State, Truck} from './types'

export function selectShipment(state: State, shipment: Shipment) {
  state.selectedShipmentId = shipment.id
  return state
}

export function addSelectedShipmentToTruck(state: State, truck: Truck) {
  const shipment = state.shipments.find((x) => x.id === state.selectedShipmentId)
  if (!shipment || truck.availableWeight < shipment.weight) {
    return state
  }
  state.shipments = state.shipments.filter((x) => x.id !== state.selectedShipmentId)
  truck.shipments.push(shipment)
  state = updateTruck(state, truck)
  state.selectedShipmentId = undefined
  return state
}

export function removeShipmentFromTruck(state: State, truck: Truck, shipment: Shipment) {
  truck.shipments = truck.shipments.filter((x) => x.id !== shipment.id)
  state = updateTruck(state, truck)
  state.shipments.push(shipment)
  state.selectedShipmentId = shipment.id
  return state
}

export function assignAll(state: State) {
  for (const truck of state.trucks) {
    state.shipments.push(...truck.shipments)
    truck.shipments = []
    truck.availableWeight = truck.weight
    truck.clients = []
    truck.distance = 0
  }
  state.trucks = getOptimalAssignments(state)
  const assignedShipmentsIds = new Set(state.trucks.flatMap((x) => x.shipments.map((x) => x.id)))
  state.shipments = state.shipments.filter((x) => !assignedShipmentsIds.has(x.id))
  return state
}

function getRandomAssignments(state: State) {
  const trucks = R.clone(state.trucks)
  const index = {}
  for (const shipment of state.shipments) {
    if (!index[shipment.clientId]) index[shipment.clientId] = []
    index[shipment.clientId].push(shipment)
  }
  const packs = Object.values(index) as Shipment[][]
  for (const pack of packs) {
    const weight = R.sum(pack.map((x) => x.weight))
    const availableTrucks = trucks.filter((x) => x.availableWeight >= weight)
    const randomIndex = Math.floor(availableTrucks.length * Math.random())
    const truck = availableTrucks[randomIndex]
    truck.shipments.push(...pack)
    truck.availableWeight -= weight
  }

  for (const truck of trucks) {
    updateTruck(state, truck)
  }

  return trucks
}

function getOptimalAssignments(state, maxIterations = 10) {
  let bestAssignment = getRandomAssignments(state)
  let bestDistance = R.sum(bestAssignment.map((x) => x.distance))
  for (let i = 0; i < maxIterations; i++) {
    const [a, d] = getOptimalLocalAssignments(state)
    if (d < bestDistance) {
      bestDistance = d
      bestAssignment = a
    }
  }
  return bestAssignment
}

function getOptimalLocalAssignments(state: State, maxIterations = 10) {
  let bestAssignment = getRandomAssignments(state)
  let bestDistance = R.sum(bestAssignment.map((x) => x.distance))
  for (let i = 0; i < maxIterations; i++) {
    let changed = false
    const similar = similarAssignments(state, bestAssignment)
    for (const a of similar) {
      const d = R.sum(a.map((x) => x.distance))
      if (d < bestDistance) {
        bestDistance = d
        bestAssignment = a
        changed = true
      }
    }
    if (!changed) break
  }
  return [bestAssignment, bestDistance] as const
}

function similarAssignments(state: State, trucks: Truck[]) {
  const solutions = []
  for (let i = 0; i < trucks.length - 1; i++) {
    const truckA = trucks[i]
    const packsA = Object.values(
      truckA.shipments.reduce((index, x) => {
        if (!index[x.clientId]) index[x.clientId] = []
        index[x.clientId].push(x)
        return index
      }, {})
    ) as Shipment[][]
    for (let j = 1; j < trucks.length; j++) {
      const truckB = trucks[j]
      const packsB = Object.values(
        truckB.shipments.reduce((index, x) => {
          if (!index[x.clientId]) index[x.clientId] = []
          index[x.clientId].push(x)
          return index
        }, {})
      ) as Shipment[][]

      for (let k = 0; k < packsA.length; k++) {
        const pack = packsA[k]
        const weight = R.sum(pack.map((x) => x.weight))
        if (truckB.availableWeight < weight) continue
        const solution = R.clone(trucks)
        const a = solution[i]
        const b = solution[j]
        const ids = new Set(pack.map((x) => x.id))
        a.shipments = a.shipments.filter((x) => !ids.has(x.id))
        a.availableWeight += weight
        updateTruck(state, a)
        b.shipments.push(...pack)
        b.availableWeight -= weight
        updateTruck(state, b)
        solutions.push(solution)
      }

      for (let k = 0; k < packsB.length; k++) {
        const pack = packsB[k]
        const weight = R.sum(pack.map((x) => x.weight))
        if (truckA.availableWeight < weight) continue
        const solution = R.clone(trucks)
        const b = solution[i]
        const a = solution[j]
        const ids = new Set(pack.map((x) => x.id))
        a.shipments = a.shipments.filter((x) => !ids.has(x.id))
        a.availableWeight += weight
        updateTruck(state, a)
        b.shipments.push(...pack)
        b.availableWeight -= weight
        updateTruck(state, b)
        solutions.push(solution)
      }
    }
  }
  return solutions
}

function updateTruck(state: State, truck: Truck) {
  truck.availableWeight = truck.weight - R.sum(truck.shipments.map((x) => x.weight))
  const clients = new Set(truck.shipments.map((x) => state.clients[x.clientId]))
  truck.clients = getOptimalPath(state, [...clients])
  truck.distance = getPathDistance(state, truck.clients)
  return state
}

function distance(state: State, a: Client, b: Client) {
  const key = a.id < b.id ? `${a.id}-${b.id}` : `${b.id}-${a.id}`
  return state.distances[key]
}

function getPathDistance(state: State, clients: Client[]) {
  const positions = [state.warehouse, ...clients, state.warehouse]
  let current = positions[0]
  let totalDistance = 0
  for (let i = 1; i < positions.length; i++) {
    totalDistance += distance(state, current, positions[i])
    current = positions[i]
  }
  return totalDistance
}

function getOptimalLocalPath(state: State, clients: Client[], maxIterations = 100) {
  let bestPath = clients
  let bestDistance = getPathDistance(state, clients)
  for (let i = 0; i < maxIterations; i++) {
    let changed = false
    const similar = similarPaths(bestPath)
    for (const path of similar) {
      const d = getPathDistance(state, path)
      if (d < bestDistance) {
        bestDistance = d
        bestPath = path
        changed = true
      }
    }
    if (!changed) break
  }
  return [bestPath, bestDistance] as const
}

function getOptimalPath(state: State, clients: Client[], maxIterations = 10) {
  let bestPath = clients
  let bestDistance = getPathDistance(state, clients)
  for (let _ = 0; _ < maxIterations; _++) {
    const [path, d] = getOptimalLocalPath(state, clients)
    if (d < bestDistance) {
      bestDistance = d
      bestPath = path
    }
    shuffle(clients)
  }
  return bestPath
}

function similarPaths(clients: Client[]) {
  const paths = []
  for (let i = 0; i < clients.length - 1; i++) {
    const path = [...clients]
    path[i] = clients[i + 1]
    path[i + 1] = clients[i]
    paths.push(path)
  }
  return paths
}

function shuffle<T>(items: T[]) {
  let currentIndex = items.length
  while (currentIndex != 0) {
    const randomIndex = Math.floor(Math.random() * currentIndex)
    currentIndex--
    ;[items[currentIndex], items[randomIndex]] = [items[randomIndex], items[currentIndex]]
  }
  return items
}
