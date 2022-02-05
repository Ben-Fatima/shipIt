<nav
    class="
        sticky
        p-4
        shadow
        top-0
        z-10
        flex
        items-center
        bg-stone-100
        justify-between
        w-full
    "
>
    <div class="w-full flex items-center m-auto">
        <div class="flex-grow">
            <img src="/LOGO.png" class="w-32" alt="logo Shipit" />
        </div>
        <x-navbar.link to="/shipments">Shipments</x-navbar.link>
        <x-navbar.link to="/products">Products</x-navbar.link>
        <x-navbar.link to="/trucks">Trucks</x-navbar.link>
        <x-navbar.link to="/clients">Clients</x-navbar.link>
        <x-navbar.link to="/transport">Transport</x-navbar.link>
    </div>
</nav>
