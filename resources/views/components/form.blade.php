<form {{$attributes->
    merge(['class' => "mt-8"])}}> @csrf
    {{ $slot }}
</form>
