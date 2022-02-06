import {getDistance} from 'geolib'
import {Client, Shipment, State, Truck} from './types'

export const initialState = makeInitialState((window as any).__DATA__)

function makeInitialState(data: any): State {
  const weights: Record<number, number> = {}
  for (const product of data.products) {
    weights[product.id] = product.weight
  }

  const shipments: Shipment[] = data.shipments.map((x) => ({
    id: x.id,
    clientId: Number(x.client_id),
    reference: x.reference,
    weight: x.items.reduce((w, item) => w + item.quantity * weights[item.product_id], 0),
  }))

  const trucks: Truck[] = data.trucks.map((x) => ({
    id: x.id,
    weight: Number(x.max_weight),
    availableWeight: Number(x.max_weight),
    distance: 0,
    shipments: [],
    clients: [],
  }))

  const clients: Record<number, Client> = {}
  for (const x of data.clients) {
    clients[x.id] = {
      id: x.id,
      name: x.name,
      latitude: Number(x.latitude),
      longitude: Number(x.longitude),
    }
  }

  const {latitude, longitude} = data.warehouse
  const warehouse = {
    id: 0,
    name: 'Warehouse',
    latitude: Number(latitude),
    longitude: Number(longitude),
  }

  const distances = {}
  const clientValues = Object.values(clients)
  for (const a of [warehouse, ...clientValues]) {
    for (const b of [warehouse, ...clientValues]) {
      const key = a.id < b.id ? `${a.id}-${b.id}` : `${b.id}-${a.id}`
      if (!distances[key]) distances[key] = getDistance(a, b)
    }
  }

  return {clients, shipments, trucks, distances, warehouse}
}
