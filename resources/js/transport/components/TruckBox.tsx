import React from "react";
import { ShipmentBox } from ".";
import { actions } from "../store";
import { Truck } from "../store/state";

type Props = { truck: Truck };

export function TruckBox({ truck }: Props) {
  return (
    <div className="flex flex-wrap">
      <div
        className="m-2 p-2 w-52 rounded-md border border-gray-300 cursor-pointer"
        onClick={() => actions.addSelectedShipmentToTruck(truck)}
      >
        Ref: {truck.id} <br />
        Available W: {truck.availableWeight / 1000} kg <br />
        Distance: {truck.distance} km
      </div>
      {truck.shipments.map((x) => (
        <ShipmentBox key={x.id} truck={truck} shipment={x} />
      ))}
    </div>
  );
}
