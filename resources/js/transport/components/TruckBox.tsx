import {motion} from 'framer-motion'
import React from 'react'
import {ShipmentBox} from '.'
import {actions} from '../store'
import {Truck} from '../store/types'

type Props = {truck: Truck}

export function TruckBox({truck}: Props) {
  return (
    <div className="flex flex-wrap">
      <div className="m-2 p-2 w-52 rounded-md border border-gray-300 cursor-pointer" onClick={() => actions.addSelectedShipmentToTruck(truck)}>
        <div>
          <i className="fas fa-truck text-xs text-gray-500"></i>
        </div>
        <h3 className="text-center text-gray-800 font-semibold uppercase py-4">{truck.id}</h3>
        <div className="w-2/3 mx-auto">
          <p className="text-justify pb-4">
            <i className="fas fa-weight-hanging px-1 text-orange-600"></i>
            {truck.availableWeight / 1000} kg
          </p>
          <p className="text-justify pb-4">
            <i className="fas fa-route px-1 text-orange-600"></i>
            {truck.distance / 1000} km
          </p>
        </div>
      </div>
      <div>
        {truck.clients.length ? (
          <div className="flex">
            <div className="m-2 p-2 border">Warehouse</div>
            {truck.clients.map((x) => (
              <div key={x.id} className="m-2 p-2 border">
                {x.name}
              </div>
            ))}
            <div className="m-2 p-2 border">Warehouse</div>
          </div>
        ) : null}
        <div className="border border-gray-200 rounded-md flex flex-wrap p-2 m-2">
          {truck.shipments.map((x) => (
            <motion.div key={x.id} initial={{y: '-50vh'}} animate={{y: 0}}>
              <ShipmentBox truck={truck} shipment={x} />
            </motion.div>
          ))}
        </div>
      </div>
    </div>
  )
}
