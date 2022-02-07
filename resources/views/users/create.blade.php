<x-layout>
  <div class="w-10/12 mx-auto">
    <h1 class="bold text-5xl orange py-8 leading-loose uppercase text-center">Register now</h1>
  </div>
  <form class="w-1/2 mx-auto border rounded mt-8 p-10" method="POST" action="/register">
    @csrf
    <label class="block py-4 text-gray-800 text-lg font-medium">Name</label>
    <input class="block w-full px-4 py-2 border rounded" name="name" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Password</label>
    <input class="block w-full px-4 py-2 border rounded" name="password" type="password" required />
    <label class="block py-4 text-gray-800 text-lg font-medium">Role</label>
    <select class="block w-full px-4 py-2 border rounded" name="role" type="text" required>
      <option>Choose a role</option>
      <option>Administrateur</option>
      <option>Visiteur</option>
    </select>
    <button class="py-2 px-16 rounded-full bg-orange-500 border border-orange-500 my-6 font-medium text-white" type="submit">submit</button>
  </form>
</x-layout>
