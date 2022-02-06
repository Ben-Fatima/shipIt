import React from "react";
import { ShipmentBox, TruckBox } from "./components";
import { useSelector } from "./store";

export function App() {
  const { shipments, trucks } = useSelector((x) => x);
  return (
    <>
      <h1 className="text-2xl font-bold">Shipments</h1>
      <div className="flex flex-wrap">
        {shipments.map((x) => (
          <ShipmentBox key={x.id} shipment={x} />
        ))}
      </div>
      <h1 className="text-2xl font-bold">Trucks</h1>
      {trucks.map((x) => (
        <TruckBox key={x.id} truck={x} />
      ))}
    </>
  );
}
