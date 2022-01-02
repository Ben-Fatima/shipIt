@props(['title','name','options'])
<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-base font-semibold text-gray-600  tracking-wider">
  <a class="block" href="">{{$title}}</a>                 
  <select id='{{$name}}' class="block bg-white border border-gray-200 px-2 py-1 w-full text-gray-500 rounded-md text-xs">
      @foreach ($options as $value => $label)
          <option value="{{$value}}" {{request($name) == $value ? 'selected' : ''}}>{{$label}}</option>
      @endforeach
  </select>  
</th>
<script>
  makeFilter("{{$name}}");
</script>