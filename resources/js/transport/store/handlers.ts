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
  const trucks = generateAssignments(state)
  state.trucks = trucks
  const assignedShipmentsIds = new Set(trucks.flatMap((x) => x.shipments.map((x) => x.id)))
  state.shipments = state.shipments.filter((x) => !assignedShipmentsIds.has(x.id))
  return state
}

function generateAssignments(state: State): Truck[] {
  const trucks = [...state.trucks]
  for (const shipment of state.shipments) {
    const freeTruck = trucks.find((x) => x.availableWeight >= shipment.weight)
    if (freeTruck == null) continue
    freeTruck.shipments.push(shipment)
    freeTruck.availableWeight -= shipment.weight
  }
  for (const truck of trucks) {
    updateTruck(state, truck)
  }
  return trucks
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

function getOptimalPath(state: State, clients: Client[], maxIterations = 100) {
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
