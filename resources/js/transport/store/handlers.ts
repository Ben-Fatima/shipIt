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

function updateTruck(state: State, truck: Truck) {
  truck.availableWeight = truck.weight - R.sum(truck.shipments.map((x) => x.weight))
  const clients = new Set(truck.shipments.map((x) => state.clients[x.clientId]))
  truck.clients = getOptimalLocalPath(state, [...clients])
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
  console.log(
    `finding optiomal path for`,
    clients.map((x) => x.name)
  )
  let bestPath = clients
  let bestDistance = getPathDistance(state, clients)
  console.log(
    `best path`,
    bestPath.map((x) => x.name)
  )
  console.log(`best distance`, bestDistance)
  for (let i = 0; i < maxIterations; i++) {
    let changed = false
    const similar = similarPaths(bestPath)
    console.log('checking similar paths', similar)
    for (const path of similar) {
      const d = getPathDistance(state, path)
      console.log(
        'distance of path',
        path.map((x) => x.name),
        'is',
        d
      )
      if (d < bestDistance) {
        console.log(`found new best path`)
        bestDistance = d
        bestPath = path
        changed = true
        console.log(
          `best path`,
          bestPath.map((x) => x.name)
        )
        console.log(`best distance`, bestDistance)
      }
    }
    if (!changed) break
  }
  console.log(
    `optimal path`,
    bestPath.map((x) => x.name)
  )
  console.log(`optimal distance`, bestDistance)
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
