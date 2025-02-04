<nav class="bg-blue-600 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-white text-2xl font-bold">InventarisApp</a>

        <!-- Menu untuk desktop -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="text-white hover:text-gray-300 transition duration-300">Home</a>
            <a href="{{ route('peminjaman.index') }}" class="text-white hover:text-gray-300 transition duration-300">Peminjaman</a>
            <a href="{{ route('inventaris.index') }}" class="text-white hover:text-gray-300 transition duration-300">Admin</a>
        </div>

        <!-- Hamburger untuk mobile -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu untuk mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-blue-500 p-4 space-y-2">
        <a href="#" class="block text-white hover:text-gray-300">Home</a>
        <a href="#" class="block text-white hover:text-gray-300">Peminjaman</a>
        <a href="#" class="block text-white hover:text-gray-300">Admin</a>
    </div>
</nav>