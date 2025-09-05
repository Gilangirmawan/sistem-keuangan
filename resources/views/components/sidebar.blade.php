<aside 
    class="fixed inset-y-0 left-0 z-30 w-64 bg-black text-white flex flex-col transform transition-transform duration-300 ease-in-out md:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <div class="flex items-center gap-10">
            <img src="{{ asset('img/hijau.png') }}" alt="Logo" class="w-full">
            {{-- <div>
                <h1 class="text-lg font-bold">Pencatatan</h1>
                <p class="text-sm text-gray-400">Keuangan</p>
            </div> --}}
        </div>
        <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <nav class="flex-1 p-2 space-y-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-green-500 text-white' : 'hover:bg-gray-800' }}">
            <i class="fa-solid fa-gauge-high w-5 text-center"></i> <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.kategori.index') }}"
            class="flex items-center gap-3 px-4 py-2 rounded {{ request()->routeIs('admin.kategori.index') ? 'bg-green-500 text-white' : 'hover:bg-gray-800' }}">
            <i class="fa-solid fa-tags w-5 text-center"></i> <span>Kategori</span>
        </a>

        <div x-data="{ open: {{ request()->routeIs(['admin.pemasukan.*', 'admin.pengeluaran.*']) ? 'true' : 'false' }} }">
            <button @click="open = !open" 
                    class="flex items-center justify-between gap-3 px-4 py-2 rounded w-full text-left {{ request()->routeIs(['admin.pemasukan.*', 'admin.pengeluaran.*']) ? 'bg-gray-900 text-white' : 'hover:bg-gray-800' }}">
                <span class="flex items-center gap-3">
                    <i class="fas fa-credit-card w-5 text-center"></i>
                    <span>Transaksi</span>
                </span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" x-transition class="mt-1 ml-5 pl-3 border-l-2 border-gray-700 flex flex-col">
                <a href="{{ route('admin.pemasukan.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded text-sm {{ request()->routeIs('admin.pemasukan.*') ? 'bg-green-500 text-white' : 'hover:bg-gray-800' }}">
                    <i class="fa-solid fa-wallet w-5 text-center"></i> <span>Pemasukan</span>
                </a>
                
                <a href="{{ route('admin.pengeluaran.index') }}" 
                    class="flex items-center gap-3 px-4 py-2 rounded text-sm {{ request()->routeIs('admin.pengeluaran.*') ? 'bg-green-500 text-white' : 'hover:bg-gray-800' }}">
                    <i class="fa-solid fa-money-bill-transfer w-5 text-center"></i> <span>Pengeluaran</span>
                </a>
            </div>
        </div>

        <div x-data="{ open: {{ request()->routeIs(['admin.laba.*', 'admin.buku.*', 'admin.kas.*']) ? 'true' : 'false' }} }">
            <button @click="open = !open" 
                    class="flex items-center justify-between gap-3 px-4 py-2 rounded w-full text-left {{ request()->routeIs(['admin.laba.*', 'admin.buku.*', 'admin.kas.*']) ? 'bg-gray-900 text-white' : 'hover:bg-gray-800' }}">
                <span class="flex items-center gap-3">
                    <i class="fa-solid fa-folder-closed w-5 text-center"></i>
                    <span>Laporan Keuangan</span>
                </span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" x-transition class="mt-1 ml-5 pl-3 border-l-2 border-gray-700 flex flex-col">
                <a href="{{ route('admin.laba.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded text-sm {{ request()->routeIs('admin.laba.*') ? 'bg-green-500 text-white' : '' }}">
                    <i class="fa-solid fa-chart-line w-5 text-center"></i> <span>Laba Dan Rugi</span>
                </a>
                
                <a href="{{ route('admin.buku.index')}}" 
                    class="flex items-center gap-3 px-4 py-2 rounded text-sm {{ request()->routeIs('admin.buku.*') ? 'bg-green-500 text-white' : '' }}">
                    <i class="fa-solid fa-book w-5 text-center"></i> <span>Buku Besar</span>
                </a>

                <a href="{{ route('admin.kas.index')}}" 
                    class="flex items-center gap-3 px-4 py-2 rounded text-sm {{ request()->routeIs('admin.kas.*') ? 'bg-green-500 text-white' : '' }}">
                    <i class="fa-solid fa-book-open-reader w-5 text-center"></i> <span>Arus Kas</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center gap-3 text-red-400 hover:text-red-300">
                <i class="fas fa-sign-out-alt w-5 text-center"></i> <span>Log Out</span>
            </a>
        </form>
    </div>
</aside>