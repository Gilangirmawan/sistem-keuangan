<!-- resources/views/components/sidebar.blade.php -->
<aside class="w-64 bg-gray-900 text-white flex flex-col">
    <!-- Logo -->
    <div class="flex items-center gap-2 p-4 border-b border-gray-700">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
        <div>
            <h1 class="text-lg font-bold">Pencatatan</h1>
            <p class="text-sm text-gray-400">Keuangan</p>
        </div>
    </div>

    <!-- Menu -->
<nav class="flex-1 p-2 space-y-1">
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 px-4 py-2 rounded 
       {{ request()->routeIs('dashboard') ? 'bg-sky-500 text-white' : 'hover:bg-gray-800' }}">
        <i class="fas fa-home"></i> Dashboard
    </a>

     <a href="{{route('kategori.index')}}"
       class="flex items-center gap-3 px-4 py-2 rounded {{ request()->routeIs('kategori.index') ? 'bg-sky-500 text-white' : 'hover:bg-gray-800' }}">
        <i class="fas fa-exchange-alt"></i> Kategori
    </a>

  <!-- Dropdown Transaksi -->
<div x-data="{ open: false }" class="relative">
    <!-- Menu Utama -->
    <button @click="open = !open" 
        class="flex items-center gap-3 px-4 py-2 rounded w-full text-left
        {{ request()->routeIs('transaksi.*') ? 'bg-sky-500 text-white' : 'hover:bg-gray-800' }}">
        <i class="fas fa-credit-card"></i>
        <span>Transaksi</span>
        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Dropdown Items -->
    <div x-show="open" x-transition 
         @click.away="open = false" 
         class="mt-1 ml-6 flex flex-col bg-gray-900 rounded shadow-lg overflow-hidden">

        <a href="{{ route('pemasukan.index') }}"
   class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pemasukan.*') ? 'bg-sky-500 text-white' : '' }}">
    Pemasukan
</a>
        
        <a href="{{ route('pengeluaran.index')}}" 
           class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pengeluaran') ? 'bg-sky-500 text-white' : '' }}">
            Pengeluaran
        </a>
    </div>
</div>

   

  <!-- Dropdown Laporan Keuangan -->
<div x-data="{ open: false }" class="relative">
    <!-- Menu Utama -->
    <button @click="open = !open" 
        class="flex items-center gap-3 px-4 py-2 rounded w-full text-left
        {{ request()->routeIs('transaksi.*') ? 'bg-sky-500 text-white' : 'hover:bg-gray-800' }}">
        <i class="fas fa-credit-card"></i>
        <span>Laporan Keuangan</span>
        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Dropdown Items -->
    <div x-show="open" x-transition 
         @click.away="open = false" 
         class="mt-1 ml-6 flex flex-col bg-gray-900 rounded shadow-lg overflow-hidden">

        <a href="{{ route('laba.index') }}"
            class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pemasukan.*') ? 'bg-sky-500 text-white' : '' }}">
            Laba Dan Rugi
        </a>
        
        <a href="{{ route('buku.index')}}" 
           class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pengeluaran') ? 'bg-sky-500 text-white' : '' }}">
            Buku Besar
        </a>

        <a href="{{ route('kas.index')}}" 
           class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pengeluaran') ? 'bg-sky-500 text-white' : '' }}">
            Arus Kas
        </a>
    </div>
</div>
    
</nav>


    <!-- Logout -->
    <div class="p-4 border-t border-gray-700">
        <a href="#" class="flex items-center gap-3 text-red-400 hover:text-red-300">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </a>
    </div>
</aside>
