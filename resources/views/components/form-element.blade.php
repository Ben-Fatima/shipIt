@props(['label', 'name']) @php $hasError = $errors->has($name) @endphp
<div class="mb-3 flex-grow flex items-center">
    <label
        class="block flex-grow text-lg font-medium {{
            $hasError ? 'text-red-800' : 'text-gray-800'
        }}"
        for="{{ $label }}"
        >{{ $label }}</label
    >
    <div class="w-2/3">
        {{ $slot }}
        @if ($hasError)
        <div class="text-sm text-red-600">
            @foreach ($errors->get($name) as $message)
            <p>
                <i class="fas fa-exclamation-triangle p-1"></i> {{ $message }}
            </p>
            @endforeach
        </div>
        @endif
    </div>
</div>
