@props(['name', 'value' => '', 'label'])
<x-form-element name="{{ $name }}" :label="$label">
    <input name="{{ $name }}" class="block px-4 py-2 w-full border rounded" />
</x-form-element>
