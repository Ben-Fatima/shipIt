<x-layout>
  <x-title>Trucks list</x-title>
  <a class="block flex" href="/trucks/create">
    <div class="flex-grow"></div>
    <button class="py-2 px-4 rounded-full bg-orange-600 my-6 text-gray-200 hover:bg-orange-700">Add new truck</button></a
  >

  <table class="w-full mt-4 mb-4">
    <thead class="">
      <tr>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Status
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Max weight
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Height
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Width
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Depth
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
      @foreach ($trucks as $truck)
      <tr>
        <td class="p-5 border-b border-gray-200">
          {{$truck->status}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$truck->max_weight}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$truck->height}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$truck->width}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$truck->depth}}
        </td>
        <td class="p-5 border-b border-gray-200">
          <form method="POST" action="/trucks/{{$truck->id}}">
            @csrf
            <button class="py-2 px-4 rounded bg-stone-300 text-gray-800 hover:bg-stone-400" type="submit">
              <i class="fas fa-undo-alt px-1"></i>Truck returned
            </button>
          </form>
        </td>
        <td class="p-5 border-b border-gray-200">
          <form method="POST" action="/trucks/{{$truck->id}}">
            @method('DELETE') @csrf

            <button class="py-2 px-4 rounded bg-orange-600 text-gray-100" type="submit"><i class="fas fa-trash px-1"></i>Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
