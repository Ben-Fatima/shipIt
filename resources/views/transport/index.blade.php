<x-layout>
  <div id="root"></div>
  <script>
    window.__DATA__ = {
        clients: {!!json_encode($clients)!!},
        products: {!!json_encode($products)!!},
        trucks: {!!json_encode($trucks)!!},
        shipments: {!!json_encode($shipments)!!},
    }
  </script>
  <script src="/js/transport.js"></script>
</x-layout>
