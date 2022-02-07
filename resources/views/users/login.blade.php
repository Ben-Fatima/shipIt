<x-layout>
  <h1 class="bold text-5xl orange py-8 leading-loose uppercase text-center">Welcome back</h1>
  <form method="POST" class="w-1/2 mx-auto border rounded mt-8 p-10" action="/login">
    @csrf
    <label class="block py-4 text-gray-800 text-lg font-medium">Name</label>
    <input class="block px-4 py-2 w-full border rounded italic" name="name" placeholder="enter an username" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Password</label>
    <input class="block px-4 py-2 w-full border rounded italic" placeholder="enter a password" name="password" type="password" required />
    <button
      class="
        w-1/3
        py-2
        px-4
        rounded-full
        bg-orange-500
        border border-orange-500
        my-6
        font-medium
        shadow
        text-white
        hover:text-orange-500 hover:bg-transparent
      "
      type="submit"
    >
      submit
    </button>
  </form>
</x-layout>
