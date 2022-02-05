<x-layout>
    <x-title>Add new camion</x-title>
    <form
        class="w-1/2 mx-auto border rounded mt-8 p-10"
        method="POST"
        action="/trucks/create"
    >
        @csrf
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Status</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="status"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Max weight</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="max_weight"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Height</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="height"
            required
        />

        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Width</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="width"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Depth</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="depth"
            type="text"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Latitude</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="latitude"
            type="text"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Longitude</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="longitude"
            type="text"
            required
        />
        <button
            class="
                w-1/3
                py-2
                px-4
                rounded-full
                bg-orange-600
                border border-orange-600
                my-6
                font-medium
                text-white
                hover:text-orange-600 hover:bg-transparent
            "
            type="submit"
        >
            submit
        </button>
    </form>
</x-layout>
