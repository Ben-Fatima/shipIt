<x-layout>
  <x-title>Clients list</x-title>
  <a class="block flex" href="/clients/create">
    <div class="flex-grow"></div>
    <button class="py-2 px-4 rounded-full bg-orange-600 my-6 text-gray-200 hover:bg-orange-700">Add new client</button></a
  >

  <table class="w-full mt-4 mb-4">
    <thead class="">
      <tr>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Name
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Address
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Delete
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
      <tr>
        <td class="p-5 border-b border-gray-200">
          {{$client->name}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$client->address}}
        </td>

        <td class="p-5 border-b border-gray-200">
          <form method="POST" action="/clients/{{$client->id}}">
            @method('DELETE') @csrf

            <button class="py-2 px-4 rounded bg-orange-600 text-gray-100" type="submit"><i class="fas fa-trash px-1"></i>Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
