<x-layout>
  <x-title
    >Associate products to
    <p class="text-orange-600 inline">{{$shipment->reference}}</p></x-title
  >
  <form method="POST" class="w-9/12 mx-auto" action="/shipments/{{$shipment->id}}">
    @csrf
    <label class="block py-4 text-gray-800 text-lg font-medium">Product</label>
    <select class="block w-full px-4 py-2 border rounded italic" name="product_id">
      <option>Choose the product</option>
      @foreach($products as $product)
      <option>{{$product->name}}</option>
      @endforeach
    </select>
    <label class="block py-4 text-gray-800 text-lg font-medium">Quantity </label>
    <input class="block w-full px-4 py-2 border rounded" name="quantity" required />
    <button class="py-2 px-16 rounded-full bg-orange-600 border border-orange-600 my-6 font-medium text-white" type="submit">submit</button>
  </form>
  <table class="w-9/12 mx-auto mt-4 mb-4">
    <thead class="">
      <tr>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Name
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Dimensions
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Quantity
        </th>
        <th class="px-5 py-3 border-b-2 border-gray-200 bg-stone-100 text-left text-sm font-semibold text-gray-600 tracking-wider uppercase">
          Delete
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
      <tr>
        @if(isset($item->name) && isset($item->width) && isset($item->quantity))
        <td class="p-5 border-b border-gray-200">
          {{$item->name}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$item->width}}
        </td>
        <td class="p-5 border-b border-gray-200">
          {{$item->quantity}}
        </td>
        <td class="p-5 border-b border-gray-200">
          <form method="POST" action="/recipes/edit/{{$recipe->id}}/{{$ingredient->id}}">
            @method('DELETE') @csrf
            <button
              class="
                border border-red-400
                hover:border hover:border-red-400 hover:text-red-400 hover:bg-transparent
                px-4
                rounded-full
                py-1
                text-xs
                my-2
                font-light
                cursor-pinter
                bg-red-400
                text-white
              "
              type="submit"
            >
              <i class="fas fa-trash px-1"></i>Delete
            </button>
            @endif
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
