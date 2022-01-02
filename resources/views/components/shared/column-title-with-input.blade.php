@props(['title','name','type'=>'text'])
<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-base font-semibold text-gray-600 tracking-wider"> 
  <a class="block" href="#">{{$title}}</a>
      <input 
      id="{{$name}}"
      type="{{$type}}" 
      class="block text-xs w-full px-2 py-1 rounded"
      value="{{request($name)}}">
</th>
<script>
  makeFilter("{{$name}}");
</script>
