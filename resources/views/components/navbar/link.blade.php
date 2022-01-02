@props(['to'])

<a
    href="{{ $to }}"
    class="
        cursor-pointer
        px-2
        mx-2
        text-gray-800
        hover:text-orange-600 hover:underline
    "
>
    {{ $slot }}
</a>
