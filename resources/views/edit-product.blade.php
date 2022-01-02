<x-layout>
  <div class="w-1/2 mx-auto">
  <x-title>Edit:{{$product->name}}</x-title>
  <x-form method="POST" action="/products/edit/{{$product->id}}">
    @method('PATCH')
    <x-form-input
    name="name"
    label="Name"
    value="{{$product->name}}"
  />
  <x-form-input
    name="width"
    label="Width"
    value="{{$product->width}}"
  />
  <x-form-input
    name="height"
    label="Height"
    value="{{$product->height}}"
  />
  <x-form-input
    name="weight"
    label="Weight"
    value="{{$product->weight}}"
  />
  <x-form-input
  name="depth"
  label="Depth"
  value="{{$product->depth}}"
/>
  <div class="flex">
    <button class="py-2 px-4 rounded bg-orange-600 text-gray-200" type="submit">Submit</button>
  </div>
  </x-form>
</div>
</x-layout>