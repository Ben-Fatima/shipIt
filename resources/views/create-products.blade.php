<x-layout>
    <x-title>Add new product</x-title>
    <x-shared.form
        :inputs="['Name'=>'text','Height'=>'text','Width'=>'text','Weight'=>'text','Depth'=>'text']"
    >
        <div class="w-full mx-auto mt-12 bg-blue-500">
            <div class="float-left"></div>
        </div>
    </x-shared.form>
</x-layout>
