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

        <a href="{{ route('pemasukan')}}" 
           class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pemasukan') ? 'bg-sky-500 text-white' : '' }}">
            Pemasukan
        </a>
        
        <a href="{{ route('pengeluaran')}}" 
           class="px-4 py-2 hover:bg-gray-800 {{ request()->routeIs('pengeluaran') ? 'bg-sky-500 text-white' : '' }}">
            Pengeluaran
        </a>
    </div>
</div>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-exchange-alt"></i> Titid
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-file-invoice-dollar"></i> Bill & Tax
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-bell"></i> Notifications
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-user"></i> Account
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-id-card"></i> My Card
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-cog"></i> Settings
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-headset"></i> Call Center
    </a>

    <a href="#"
       class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-800">
        <i class="fas fa-question-circle"></i> Help
    </a>
</nav>


    <!-- Logout -->
    <div class="p-4 border-t border-gray-700">
        <a href="#" class="flex items-center gap-3 text-red-400 hover:text-red-300">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </a>
    </div>
</aside>
