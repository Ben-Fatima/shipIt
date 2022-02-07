import axios from 'axios'
import * as R from 'ramda'
import React from 'react'
import {ShipmentBox, TruckBox} from './components'
import {MapView} from './components/MapView'
import {actions, useStoreState} from './store'

export function App() {
  const {shipments, trucks} = useStoreState()
  const apply = async () => {
    const trucksToAssign = trucks.filter((x) => x.shipments.length > 0)
    await axios.post('/transport', {
      trucks: trucksToAssign.map(({id, shipments}) => {
        return {id, shipments: shipments.map((x) => x.id)}
      }),
    })
    localStorage.removeItem('store')
    document.location.href = '/'
  }

  return (
    <>
      <h1 className="text-2xl font-bold text-center py-4 uppercase text-orange-600">Shipments</h1>
      <div className="flex flex-wrap">
        {shipments.map((x) => (
          <ShipmentBox key={x.id} shipment={x} />
        ))}
      </div>
      <hr />
      <button onClick={actions.assignAll} className="m-2 py-2 px-5 text-xl bg-orange-800 text-white">
        Assign All
      </button>
      <h1 className="text-2xl font-bold text-center py-4 uppercase text-orange-600">Trucks</h1>
      {trucks.map((x) => (
        <TruckBox key={x.id} truck={x} />
      ))}
      <hr />
      <div className="m-2 text-2xl text-right">Total distance: {R.sum(trucks.map((x) => x.distance)) / 1000} km</div>
      <MapView />
      <button onClick={apply} className="m-2 py-2 px-5 text-xl bg-orange-800 text-white">
        Apply
      </button>
    </>
  )
}
