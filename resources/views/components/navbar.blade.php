<nav class="sticky p-4 shadow top-0 z-10 flex items-center bg-stone-100 justify-between w-full">
  <div class="w-full flex items-center m-auto">
    <div class="flex-grow">
      <img src="/LOGO.png" class="w-32" alt="logo Shipit" />
    </div>
    @guest
    <x-navbar.link to="/register">Register</x-navbar.link>
    <x-navbar.link to="/login">Log in</x-navbar.link>
    @endguest @auth
    <x-navbar.link to="/shipments">Shipments</x-navbar.link>
    <x-navbar.link to="/products">Products</x-navbar.link>
    <x-navbar.link to="/trucks">Trucks</x-navbar.link>
    <x-navbar.link to="/clients">Clients</x-navbar.link>
    <x-navbar.link to="/transport">Transport</x-navbar.link>
    <form method="POST" action="/logout">
      @csrf
      <button class="bg-stone-200 px-6 rounded py-1 text-black text-sm hover:bg-stone-300 cursor-pinter my-4 mx-4 font-light" type="submit">
        Log Out<i class="fas fa-sign-out-alt p-1"></i>
      </button>
    </form>
    @endauth
  </div>
</nav>
