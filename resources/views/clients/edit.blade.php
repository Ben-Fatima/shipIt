<x-layout>
    <x-title>Edit {{$client->reference}}</x-title>
    <form
        class="w-1/2 mx-auto border rounded mt-8 p-10"
        method="POST"
        action="/clients/edit/{{$client->id}}"
    >
        @csrf
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Reference</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="reference"
            required
        />
        <label class="block py-4 text-gray-800 text-lg font-medium"
            >Address</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="address"
            required
        />

        <label class="block py-4 text-gray-800 text-lg font-medium"
            >L'atitude</label
        >
        <input
            class="block w-full px-4 py-2 border rounded"
            name="latitude"
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
    </form></x-layout
>
