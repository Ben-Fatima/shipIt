export type Shipment = {
  id: number;
  clientId: number;
  reference: string;
  weight: number;
};

export type Truck = {
  id: number;
  weight: number;
  availableWeight: number;
  distance: number;
  shipments: Shipment[];
};

export type State = {
  shipments: Shipment[];
  trucks: Truck[];
  selectedShipmentId?: number;
};

const weights: Record<number, number> = {};
for (const product of (window as any).__DATA__.products) {
  weights[product.id] = product.weight;
}

const shipments: Shipment[] = (window as any).__DATA__.shipments.map((x) => ({
  id: x.id,
  clientId: Number(x.client_id),
  reference: x.reference,
  weight: x.items.reduce(
    (w, item) => w + item.quantity * weights[item.product_id],
    0
  ),
}));

console.log((window as any).__DATA__);

const trucks: Truck[] = (window as any).__DATA__.trucks.map((x) => ({
  id: x.id,
  weight: Number(x.max_weight),
  availableWeight: Number(x.max_weight),
  distance: 0,
  shipments: [],
}));

export const initialState: State = { shipments, trucks };

console.log(initialState);
