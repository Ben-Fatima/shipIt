import React from 'react'
import L from 'leaflet'
import {TILE_CONFIG, TILE_URL} from '../constants'
import {useStoreState} from '../store'
import {Client, State} from '../store/types'

export function MapView() {
  const state = useStoreState()
  React.useLayoutEffect(() => {
    const map = L.map('map')
    drawMap(map, state)
    return () => map.remove()
  })
  return <div id="map" className="border rounded h-big"></div>
}

function drawMap(map, {warehouse, trucks, clients}: State) {
  map.setView([34.0184533, -6.8458213], 8)
  L.tileLayer(TILE_URL, TILE_CONFIG).addTo(map)
  addMarker(map, warehouse)
  for (const client of Object.values(clients)) {
    addMarker(map, client)
  }
  for (const truck of trucks) {
    const positions = [warehouse, ...truck.clients, warehouse]
    L.polyline(
      positions.map((x) => [x.latitude, x.longitude]),
      {color: truck.color}
    ).addTo(map)
  }
}

function addMarker(map, {latitude, longitude, name}: Client) {
  L.marker([latitude, longitude]).bindPopup(name).addTo(map)
}
