const L = require('leaflet')

window.createMap = (divId) => {
  var map = L.map(divId).setView([34.0184533, -6.8458213], 7)
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoib3Jlc2FtYSIsImEiOiJja3o3a2w4d3EwandtMnBxbXhvdzR6OGwzIn0._GHMumZqzmEnGoWGKpbI7g',
  }).addTo(map)
  return map
}
