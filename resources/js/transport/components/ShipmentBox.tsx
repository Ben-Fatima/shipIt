import React from "react";
import cn from "classnames";
import { Shipment, Truck } from "../store/state";
import { actions, useSelector } from "../store";

type Props = {
  shipment: Shipment;
  truck?: Truck;
};

export function ShipmentBox({ shipment, truck }: Props) {
  const { selectedShipmentId } = useSelector((x) => x);
  return (
    <div
      className={cn(
        "m-2 p-2 w-44 rounded-md border border-gray-300 cursor-pointer",
        {
          "bg-blue-200": shipment.id === selectedShipmentId,
        }
      )}
      onClick={() =>
        truck
          ? actions.removeShipmentFromTruck(truck, shipment)
          : actions.selectShipment(shipment)
      }
    >
      Ref: {shipment.reference} <br />
      W: {shipment.weight / 1000} kg
    </div>
  );
}
