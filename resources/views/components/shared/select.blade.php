@props(['suppliers','name'])
<div class="block mx-auto p-2 m-2">
  <label class="text-lg font-medium text-gray-800">{{$name}}</label>
  <select name="{{$name}}" class="bg-gray-100 px-4 mx-8 py-2 rounded border w-1/2 float-right">
    @foreach ($suppliers as $supplier)
      <option value="{{$supplier->id}}">{{$supplier->name}}</option>
    @endforeach
  </select> 
</div>
