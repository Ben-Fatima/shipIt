export const TILE_URL = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}'
export const TILE_CONFIG = {
  attribution:
    'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1,
  accessToken: 'pk.eyJ1Ijoib3Jlc2FtYSIsImEiOiJja3o3a2w4d3EwandtMnBxbXhvdzR6OGwzIn0._GHMumZqzmEnGoWGKpbI7g',
}

export const COLORS = ['#57534E', '#0891B2', '#CA8A04', '#65A30D', '#059669', '#EA580C', '#DB2777', '#2563EB', '#7C3AED', '#DC2626', '#C026D3']
