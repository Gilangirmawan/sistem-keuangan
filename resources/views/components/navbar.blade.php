<nav class="bg-gradient-to-r from-[#01c350] to-[#009588] fixed w-full text-white py-2 md:py-5 shadow-md z-40">
    <div class="flex items-center justify-between px-4 py-3">
        
        <div class="flex items-center">
            <button @click.stop="sidebarOpen = !sidebarOpen" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="hidden md:block ml-4">
                {{-- <h1 class="text-lg font-semibold text-white">@yield('title', 'Dashboard')</h1> --}}
            </div>
        </div>

        <div class="flex items-center space-x-3 fixed right-4 ">
            <div class="text-right">
                <p class="font-semibold">{{ Auth::user()->nama ?? 'Admin' }}</p>
                <p class="text-xs text-gray-200">{{ Auth::user()->role ?? 'Administrator' }}</p>
            </div>
        </div>
    </div>
</nav>