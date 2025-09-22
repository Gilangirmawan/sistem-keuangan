@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
{{-- 
    PENYEMPURNAAN:
    - Menambahkan watcher untuk mengunci scroll body saat modal aktif.
--}}
<div x-data="{
    isModalTambahOpen: false,
    isModalEditOpen: false,
    isModalDeleteOpen: false,
    editUrl: '',
    deleteUrl: '',
    editData: {},
    init() {
        this.$watch('isModalTambahOpen || isModalEditOpen || isModalDeleteOpen', value => {
            if (value) {
                document.body.classList.add('overflow-hidden');
            } else {
                document.body.classList.remove('overflow-hidden');
            }
        });
    }
}" class="p-4 md:p-6 mt-14">

    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Kategori</h2>
            <p class="text-gray-500">Kelola kategori untuk pemasukan dan pengeluaran.</p>
        </div>
        <button @click="isModalTambahOpen = true"
            class="w-full md:w-auto mt-4 md:mt-0 bg-[#01c350] hover:bg-[#00ad75] text-white font-bold px-4 py-2 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Kategori</span>
        </button>
    </div>
    
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
             x-transition
             class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
    @endif


    <div class="bg-white rounded-xl shadow-md">
        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="kategoriTabs" role="tablist">
                <li class="flex-1 md:flex-initial me-2">
                    <button class="w-full inline-block p-4 border-b-2 rounded-t-lg text-green-600 border-green-600" 
                            onclick="showTab(event, 'pemasukan')">
                        Pemasukan
                    </button>
                </li>
                <li class="flex-1 md:flex-initial me-2">
                    <button class="w-full inline-block p-4 border-b-2 rounded-t-lg text-gray-500 hover:text-gray-600 hover:border-gray-300" 
                            onclick="showTab(event, 'pengeluaran')">
                        Pengeluaran
                    </button>
                </li>
            </ul>
        </div>

        <div class="p-0 md:p-4">
            <!-- Tabel Pemasukan -->
            <div id="tab-pemasukan" class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden md:table-header-group">
                        <tr>
                            <th class="px-6 py-3">Nama Kategori</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4 md:space-y-0">
                        @forelse($kategori->where('jenis', 'pemasukan') as $item)
                            <tr class="block md:table-row bg-white border shadow-md md:shadow-none md:border-b rounded-lg md:rounded-none">
                                <td class="block md:table-cell px-6 py-4 text-right md:text-left border-b md:border-none font-medium text-gray-900">
                                    <span class="float-left font-bold md:hidden">Kategori</span> {{ $item->nama_kategori }}
                                </td>
                                <td class="block md:table-cell px-6 py-4 text-right md:text-left border-b md:border-none">
                                     <span class="float-left font-bold md:hidden">Jenis</span>
                                     <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ ucfirst($item->jenis) }}
                                    </span>
                                </td>
                                <td class="block md:table-cell px-6 py-4">
                                    <div class="flex justify-end md:justify-center gap-4">
                                        <button @click="isModalEditOpen = true; editUrl = '{{ route('admin.kategori.update', $item->id) }}'; editData = { nama: '{{ $item->nama_kategori }}', jenis: '{{ $item->jenis }}' };" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                            <i class="fa-solid fa-pencil fa-lg"></i>
                                        </button>
                                        <button @click="isModalDeleteOpen = true; deleteUrl = '{{ route('admin.kategori.destroy', $item->id) }}';" class="text-red-500 hover:text-red-700" title="Hapus">
                                            <i class="fa-solid fa-trash fa-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center py-10 text-gray-500">Belum ada data kategori pemasukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Tabel Pengeluaran -->
            <div id="tab-pengeluaran" class="relative overflow-x-auto hidden">
                 <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden md:table-header-group">
                        <tr>
                            <th class="px-6 py-3">Nama Kategori</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4 md:space-y-0">
                        @forelse($kategori->where('jenis', 'pengeluaran') as $item)
                            <tr class="block md:table-row bg-white border shadow-md md:shadow-none md:border-b rounded-lg md:rounded-none">
                                <td class="block md:table-cell px-6 py-4 text-right md:text-left border-b md:border-none font-medium text-gray-900">
                                    <span class="float-left font-bold md:hidden">Kategori</span> {{ $item->nama_kategori }}
                                </td>
                                <td class="block md:table-cell px-6 py-4 text-right md:text-left border-b md:border-none">
                                     <span class="float-left font-bold md:hidden">Jenis</span>
                                     <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        {{ ucfirst($item->jenis) }}
                                    </span>
                                </td>
                                <td class="block md:table-cell px-6 py-4">
                                    <div class="flex justify-end md:justify-center gap-4">
                                        <button @click="isModalEditOpen = true; editUrl = '{{ route('admin.kategori.update', $item->id) }}'; editData = { nama: '{{ $item->nama_kategori }}', jenis: '{{ $item->jenis }}' };" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                            <i class="fa-solid fa-pencil fa-lg"></i>
                                        </button>
                                        <button @click="isModalDeleteOpen = true; deleteUrl = '{{ route('admin.kategori.destroy', $item->id) }}';" class="text-red-500 hover:text-red-700" title="Hapus">
                                            <i class="fa-solid fa-trash fa-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center py-10 text-gray-500">Belum ada data kategori pengeluaran.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div x-show="isModalTambahOpen" @keydown.escape.window="isModalTambahOpen = false" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div x-show="isModalTambahOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalTambahOpen = false" x-show="isModalTambahOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Kategori Baru</h3>
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <select name="jenis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" @click="isModalTambahOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-sky-500 rounded-md hover:bg-sky-600">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div x-show="isModalEditOpen" @keydown.escape.window="isModalEditOpen = false" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div x-show="isModalEditOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalEditOpen = false" x-show="isModalEditOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Kategori</h3>
                <form :action="editUrl" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="nama_kategori" x-model="editData.nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis</label>
                        <select name="jenis" x-model="editData.jenis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" @click="isModalEditOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div x-show="isModalDeleteOpen" @keydown.escape.window="isModalDeleteOpen = false" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div x-show="isModalDeleteOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalDeleteOpen = false" x-show="isModalDeleteOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-lg shadow-xl w-full max-w-md text-center p-6">
             <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-5">Hapus Kategori</h3>
            <p class="text-sm text-gray-500 mt-2">Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.</p>
            <form :action="deleteUrl" method="POST" class="mt-6 flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" @click="isModalDeleteOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 w-full">Batal</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 w-full">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showTab(event, tab) {
        document.getElementById('tab-pemasukan').classList.add('hidden');
        document.getElementById('tab-pengeluaran').classList.add('hidden');
        document.getElementById('tab-' + tab).classList.remove('hidden');

        let buttons = document.querySelectorAll('#kategoriTabs button');
        buttons.forEach(btn => {
            btn.classList.remove('text-green-600', 'border-green-600');
            btn.classList.add('text-gray-500', 'hover:text-gray-600', 'hover:border-gray-300');
        });
        event.currentTarget.classList.add('text-green-600', 'border-green-600');
        event.currentTarget.classList.remove('text-gray-500');
    }
</script>
@endsection

