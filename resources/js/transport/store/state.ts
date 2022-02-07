import {getDistance} from 'geolib'
import {COLORS} from '../constants'
import {Client, Shipment, State, Truck} from './types'

const jsonData = localStorage.getItem('store')
export const initialState = jsonData ? JSON.parse(jsonData) : makeInitialState((window as any).__DATA__)

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

  let colorIndex = -1
  const trucks: Truck[] = data.trucks.map((x) => {
    colorIndex = (colorIndex + 1) % COLORS.length
    return {
      id: x.id,
      color: COLORS[colorIndex],
      weight: Number(x.max_weight),
      availableWeight: Number(x.max_weight),
      distance: 0,
      shipments: [],
      clients: [],
    }
  })

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
