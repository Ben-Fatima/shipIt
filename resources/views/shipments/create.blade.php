<x-layout>
  <x-title>Create new shipment</x-title>
  <form class="w-1/2 mx-auto border rounded mt-8 p-10" method="POST" action="/shipments/create">
    @csrf
    <label class="block py-4 text-gray-800 text-lg font-medium">Reference</label>
    <input class="block w-full px-4 py-2 border rounded" name="reference" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Status</label>
    <input class="block w-full px-4 py-2 border rounded" name="status" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Truck</label>
    <select class="block w-full px-4 py-2 border rounded" name="truck_id">
      <option>Choose the truck</option>
      @foreach($trucks as $truck)
      <option>{{$truck->id}}</option>
      @endforeach
    </select>
    <label class="block py-4 text-gray-800 text-lg font-medium">Client</label>
    <select class="block w-full px-4 py-2 border rounded" name="client_id">
      <option>Choose the client</option>
      @foreach($clients as $client)
      <option>{{$client->name}}</option>
      @endforeach
    </select>
    <button
      class="
        w-1/3
        py-2
        px-4
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
</x-layout>
