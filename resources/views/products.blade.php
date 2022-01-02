<x-layout>
    <x-title> Products list </x-title>
    <a href="/products/create">
        <button
            class="
                py-2
                px-4
                rounded-full
                bg-orange-600
                my-6
                shadow
                text-gray-200
                hover:bg-orange-700
            "
        >
            Add new product
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
                    name
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
                    weight
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
                    width
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
                    height
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
                    depth
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
            @foreach ($products as $product)
            <tr>
                <td class="p-5 border-b border-gray-200">
                    {{$product->name}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    {{$product->weight}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    {{$product->width}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    {{$product->height}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    {{$product->depth}}
                </td>
                <td class="p-5 border-b border-gray-200">
                    <form method="GET" action="/products/edit/{{$product->id}}">
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
                    <form method="POST" action="/products/{{$product->id}}">
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
