<x-layout>
  <div class="h-big" id="map"></div>
  <script>
    createMap("map");
    const clients = {!! json_encode($clients) !!};
  </script>
</x-layout>
