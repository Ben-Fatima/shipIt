export type Shipment = {
  id: number
  clientId: number
  reference: string
  weight: number
}

export type Truck = {
  id: number
  weight: number
  availableWeight: number
  distance: number
  shipments: Shipment[]
  clients: Client[]
}

export type Client = {
  id: number
  name: string
  latitude: number
  longitude: number
}

export type State = {
  shipments: Shipment[]
  trucks: Truck[]
  clients: Record<number, Client>
  warehouse: Client
  distances: Record<string, number>
  selectedShipmentId?: number
}
