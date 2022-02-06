import React from 'react'
import cn from 'classnames'
import {Shipment, Truck} from '../store/types'
import {actions, useSelector, useStoreState} from '../store'
import {motion} from 'framer-motion'

type Props = {
  shipment: Shipment
  truck?: Truck
}

export function ShipmentBox({shipment, truck}: Props) {
  const {clients} = useStoreState()
  const client = clients[shipment.clientId]
  const {selectedShipmentId} = useSelector((x) => x)
  return (
    <motion.div
      whileHover={{scale: 1.05}}
      whileTap={{scale: 1.15}}
      className={cn('m-2 p-2 w-44 rounded-md border border-gray-300 cursor-pointer', {
        'bg-orange-200 border-orange-600 border-2': shipment.id === selectedShipmentId,
      })}
      onClick={() => (truck ? actions.removeShipmentFromTruck(truck, shipment) : actions.selectShipment(shipment))}
    >
      <div>
        <i className="fas fa-box text-xs text-gray-500"></i>
      </div>
      <h3 className="text-center text-gray-800 font-semibold uppercase py-4">{client.name}</h3>
      <h4 className="text-center text-gray-800 uppercase py-4">{shipment.reference}</h4>
      <p className="text-center pb-4">
        <i className="fas fa-weight-hanging px-1 text-orange-600"></i>
        {shipment.weight / 1000} kg
      </p>
    </motion.div>
  )
}
