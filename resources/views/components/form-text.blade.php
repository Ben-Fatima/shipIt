@props(['label', 'value'])
<x-form-element name="---" label="{{ $label }}">
    <div class="px-4 py-2 bg-gray-200 border border-gray-100 rounded">
        <p>{{ $value }}</p>
    </div>
</x-form-element>
