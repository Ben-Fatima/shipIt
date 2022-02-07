<x-layout>
  <x-title> shipments list </x-title>
  <a class="block flex" href="/shipments/create">
    <div class="flex-grow"></div>
    <button class="py-2 px-4 rounded-full bg-orange-600 my-6 text-gray-200 hover:bg-orange-700">Create new shipment</button></a
  >

  <table class="w-full mt-4 mb-4">
    <thead class="">
      <tr>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Status
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          reference
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          truck
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          client
        </th>
        <th
          class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase"
        ></th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Delete
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($shipments as $shipment)
      <tr>
        <td class="p-5 border-b border-gray-200">
          {{$shipment->status}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$shipment->reference}}
        </td>
        @if(isset($shipment->truck->id))
        <td class="p-5 border-b border-gray-200">
          {{$shipment->truck->id}}
        </td>
        @else
        <td class="p-5 border-b border-gray-200">NULL</td>
        @endif
        <td class="p-5 border-b border-gray-200">
          {{$shipment->client->name}}
        </td>
        <td class="p-5 border-b border-gray-200">
          <form method="GET" action="/shipments/{{$shipment->id}}">
            @csrf
            <button class="py-2 px-4 rounded bg-stone-200 text-gray-800" type="submit"><i class="fas fa-link px-1"></i>Assign products</button>
          </form>
        </td>
        <td class="p-5 border-b border-gray-200">
          <form method="POST" action="/shipments/{{$shipment->id}}">
            @method('DELETE') @csrf

            <button class="py-2 px-4 rounded bg-orange-600 text-gray-100" type="submit"><i class="fas fa-trash px-1"></i>Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
