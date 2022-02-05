@props(['to'])

<a
    href="{{ $to }}"
    class="
        cursor-pointer
        px-2
        mx-2
        text-orange-600
        hover:text-orange-700 hover:underline
    "
>
    {{ $slot }}
</a>
