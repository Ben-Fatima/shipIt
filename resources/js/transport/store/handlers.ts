import { Shipment, State, Truck } from "./state";

export function selectShipment(state: State, shipment: Shipment) {
  state.selectedShipmentId = shipment.id;
  return state;
}

export function addSelectedShipmentToTruck(state: State, truck: Truck) {
  const shipment = state.shipments.find(
    (x) => x.id === state.selectedShipmentId
  );
  if (!shipment || truck.availableWeight < shipment.weight) {
    return state;
  }
  state.shipments = state.shipments.filter(
    (x) => x.id !== state.selectedShipmentId
  );
  truck.shipments.push(shipment);
  truck.availableWeight -= shipment.weight;
  state.selectedShipmentId = undefined;
  return state;
}

export function removeShipmentFromTruck(
  state: State,
  truck: Truck,
  shipment: Shipment
) {
  truck.shipments = truck.shipments.filter((x) => x.id !== shipment.id);
  truck.availableWeight += shipment.weight;
  state.shipments.push(shipment);
  state.selectedShipmentId = shipment.id;
  return state;
}
