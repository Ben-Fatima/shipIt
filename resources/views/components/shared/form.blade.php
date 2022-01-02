@props(['inputs'])
<form method="POST" action="/products/create" class="w-1/2 mx-auto mt-8">
    @csrf @foreach ($inputs as $name => $type)
    <div class="block mx-auto p-2 m-2">
        <label class="text-lg font-medium text-gray-800" for="{{ $name }}">{{
            $name
        }}</label>
        <input
            class="bg-gray-100 px-4 mx-8 py-2 rounded border w-1/2 float-right"
            type="{{ $type }}"
            name="{{ $name }}"
            required
        />
    </div>
    @endforeach
    {{ $slot }}
    <button
        class="
            w-1/3
            py-2
            px-4
            rounded
            bg-orange-600
            my-6
            shadow
            text-gray-200
            hover:bg-orange-700
        "
        type="submit"
    >
        Submit
    </button>
    @foreach ($errors->all() as $error)
    <p class="text-red-500 text-sm mt-2">
        {{ $error }}
    </p>

    @endforeach
</form>
