<x-layout>
    <x-title>Camions list</x-title>
    <a href="/camions/create">
        <button
            class="
                py-2
                px-4
                rounded-full
                bg-orange-600
                my-6
                text-gray-200
                hover:bg-orange-700
            "
        >
            Add new camion
        </button></a
    >

    <table class="w-full mt-4 mb-4">
        <thead class="">
            <tr>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Max weight
                </th>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Height
                </th>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Width
                </th>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Depth
                </th>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Shipment
                </th>

                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Edit
                </th>
                <th
                    class="
                        px-5
                        py-3
                        border-b-2 border-gray-200
                        bg-stone-100
                        text-left text-sm
                        font-semibold
                        text-gray-600
                        tracking-wider
                        uppercase
                    "
                >
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camions as $camion)
            <tr>
                <td class="p-5 border-b border-gray-200">
                    {{$camion->capacity}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    {{$camion->address}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    <form method="GET" action="/clients/edit/{{$camion->id}}">
                        @csrf
                        <button
                            class="py-2 px-4 rounded bg-stone-100 text-gray-800"
                            type="submit"
                        >
                            <i class="fas fa-edit px-1"></i>Edit
                        </button>
                    </form>
                </td>
                <td class="p-5 border-b border-gray-200">
                    <form method="POST" action="/clients/{{$camion->id}}">
                        @method('DELETE') @csrf

                        <button
                            class="
                                py-2
                                px-4
                                rounded
                                bg-orange-600
                                text-gray-100
                            "
                            type="submit"
                        >
                            <i class="fas fa-trash px-1"></i>Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
