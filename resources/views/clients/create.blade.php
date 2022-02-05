<x-layout>
  <x-title>Add new client</x-title>
  <form
    class="mx-auto border rounded mt-8 p-10"
    method="POST"
    action="/clients/create"
  >
    @csrf
    <label class="block py-4 text-gray-800 text-lg font-medium">Name</label>
    <input class="block w-full px-4 py-2 border rounded" name="name" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Address</label>
    <input
      class="block w-full px-4 py-2 border rounded"
      name="address"
      required
    />
    <label class="block py-4 text-gray-800 text-lg font-medium">Latitude</label>
    <input
      class="block bg-gray-200 w-full px-4 py-2 border rounded"
      type="text"
      name="latitude"
      required
    />
    <label class="block py-4 text-gray-800 text-lg font-medium"
      >Longitude</label
    >
    <input
      class="block bg-gray-200 w-full px-4 py-2 border rounded"
      name="longitude"
      type="text"
      required
    />
    <div id="map" class="h-small mt-12"></div>
    <button
      class="
        py-2
        px-12
        rounded-full
        bg-orange-600
        border border-orange-600
        my-6
        font-medium
        text-white
        hover:text-orange-600 hover:bg-transparent
      "
      type="submit"
    >
      submit
    </button>
  </form>

  <script>
    const map = createMap("map");
    let lat = 0;
    let lng = 0;
    let marker = L.marker([lat, lng]);
    const latInput = document.querySelector('input[name="latitude"]');
    const lngInput = document.querySelector('input[name="longitude"]');
    map.on("click", (e) => {
      lat = e.latlng.lat;
      lng = e.latlng.lng;
      marker.setLatLng([lat, lng]).addTo(map);
      latInput.value = lat;
      lngInput.value = lng;
    });
    latInput.addEventListener("change", (e) => {
      lat = e.target.value;
      marker.setLatLng([lat, lng]).addTo(map);
    });
    lngInput.addEventListener("change", (e) => {
      lng = e.target.value;
      marker.setLatLng([lat, lng]).addTo(map);
    });
  </script>
</x-layout>
