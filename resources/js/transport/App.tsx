import React from "react";
import { ShipmentBox, TruckBox } from "./components";
import { useSelector } from "./store";

export function App() {
  const { shipments, trucks } = useSelector((x) => x);
  return (
    <>
      <h1 className="text-2xl font-bold text-center py-4 uppercase text-orange-600">
        Shipments
      </h1>
      <div className="flex flex-wrap">
        {shipments.map((x) => (
          <ShipmentBox key={x.id} shipment={x} />
        ))}
      </div>
      <div className="w-full h-px bg-gray-400 mt-8"></div>
      <h1 className="text-2xl font-bold text-center py-4 uppercase text-orange-600">
        Trucks
      </h1>
      {trucks.map((x) => (
        <TruckBox key={x.id} truck={x} />
      ))}
    </>
  );
}
