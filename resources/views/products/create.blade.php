<x-layout>
    <x-title>Add new product</x-title>
    <form
        class="w-1/2 mx-auto border rounded mt-8 p-10"
        method="POST"
        action="/products/create"
    >
        @csrf
        <label class="block py-4 text-gray-800 text-lg font-medium">Name</label>
        <input
            class="block w-full px-4 py-2 border rounded"
            name="name"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Weight</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="weight"
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
            >width</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="width"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >depth</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="depth"
            type="text"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Quantity</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="quantity"
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
