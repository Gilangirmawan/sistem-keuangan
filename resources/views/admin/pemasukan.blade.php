@extends('layouts.app')

@section('title', 'Manajemen Pemasukan')

@section('content')
{{-- 
    PENYEMPURNAAN:
    - Migrasi penuh ke Alpine.js untuk semua modal.
    - Menambahkan watcher untuk mengunci scroll body saat modal aktif.
    - Tabel diubah menjadi format kartu di mobile agar responsif.
    - Tampilan tabel desktop disempurnakan dengan lebih banyak kolom.
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
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Pemasukan</h2>
            <p class="text-gray-500">Catat, lihat, dan kelola semua transaksi pemasukan Anda.</p>
        </div>
        <button @click="isModalTambahOpen = true"
            class="w-full md:w-auto mt-4 md:mt-0 bg-[#01c350] hover:bg-[#00ad75] text-white font-bold px-4 py-2 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Pemasukan</span>
        </button>
    </div>

    <!-- Pesan Notifikasi Sukses -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            x-transition
            class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Konten Utama: Card dengan Tabel -->
    <div class="bg-white rounded-xl shadow-md">
        <div class="p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-700">Daftar Pemasukan</h3>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">Keterangan</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-right">Total</th>
                        <th class="px-6 py-3 text-center">Bukti</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="md:divide-y md:divide-gray-200">
                    @php $no = $pemasukan->firstItem(); @endphp
                    @forelse($pemasukan as $item)
                        <tr class="block md:table-row mb-4 md:mb-0 border shadow-md md:shadow-none md:border-none rounded-lg md:rounded-none">
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 font-medium text-gray-900 border-b md:border-none">
                                <span class="font-bold md:hidden">No: </span>{{ $no++ }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 whitespace-nowrap font-medium text-gray-900 border-b md:border-none">
                                <span class="font-bold md:hidden">Keterangan: </span>{{ $item->keterangan ?: 'Transaksi Pemasukan' }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 border-b md:border-none">
                                <span class="font-bold md:hidden">Kategori: </span>{{ $item->kategori->nama_kategori ?? 'N/A' }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 border-b md:border-none">
                                <span class="font-bold md:hidden">Tanggal: </span>{{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right font-semibold text-green-600 border-b md:border-none">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Total: </span>Rp {{ number_format($item->total, 0, ',', '.') }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right md:text-center border-b md:border-none">
                                <span class="font-bold md:hidden float-left">Bukti: </span>
                                @if($item->bukti_transaksi)
                                    <a href="{{ asset('storage/' . $item->bukti_transaksi) }}" target="_blank" class="text-sky-500 hover:underline">Lihat Bukti</a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right md:text-center">
                                 <span class="font-bold md:hidden float-left">Aksi: </span>
                                <div class="flex justify-end md:justify-center gap-4">
                                    <button @click="isModalEditOpen = true; editUrl = '{{ route('admin.pemasukan.update', $item->id) }}'; editData = {{ json_encode($item) }};" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                        <i class="fa-solid fa-pencil fa-lg"></i>
                                    </button>
                                    <button @click="isModalDeleteOpen = true; deleteUrl = '{{ route('admin.pemasukan.destroy', $item->id) }}';" class="text-red-500 hover:text-red-700" title="Hapus">
                                        <i class="fa-solid fa-trash fa-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10 text-gray-500">
                                <i class="fa-solid fa-folder-open text-3xl mb-2"></i>
                                <p>Belum ada data pemasukan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">
            {{ $pemasukan->links() }}
        </div>
    </div>

    <!-- Modal Tambah -->
    <div x-show="isModalTambahOpen" @keydown.escape.window="isModalTambahOpen = false" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div x-show="isModalTambahOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalTambahOpen = false" x-show="isModalTambahOpen" x-transition class="relative bg-white rounded-lg shadow-xl w-full max-w-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Data Pemasukan</h3>
                <form action="{{ route('admin.pemasukan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="keterangan_tambah" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <input type="text" id="keterangan_tambah" name="keterangan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="id_kategori_tambah" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori_tambah" name="id_kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori->where('jenis', 'pemasukan') as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="jumlah_tambah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="jumlah_tambah" name="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="total_tambah" class="block text-sm font-medium text-gray-700">Total Pemasukan</label>
                        <input type="number" id="total_tambah" name="total" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="bukti_transaksi_tambah" class="block text-sm font-medium text-gray-700">Bukti Transaksi</label>
                        <input type="file" id="bukti_transaksi_tambah" name="bukti_transaksi" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
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
        <div x-show="isModalEditOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalEditOpen = false" x-show="isModalEditOpen" x-transition class="relative bg-white rounded-lg shadow-xl w-full max-w-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Data Pemasukan</h3>
                <form :action="editUrl" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="keterangan_edit" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <input type="text" id="keterangan_edit" name="keterangan" x-model="editData.keterangan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="id_kategori_edit" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori_edit" name="id_kategori" x-model="editData.id_kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($kategori->where('jenis', 'pemasukan') as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="jumlah_edit" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="jumlah_edit" name="jumlah" x-model="editData.jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="total_edit" class="block text-sm font-medium text-gray-700">Total Pemasukan</label>
                        <input type="number" id="total_edit" name="total" x-model="editData.total" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="bukti_transaksi_edit" class="block text-sm font-medium text-gray-700">Bukti Transaksi <small>(kosongkan jika tidak diubah)</small></label>
                        <input type="file" id="bukti_transaksi_edit" name="bukti_transaksi" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
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
        <div x-show="isModalDeleteOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50"></div>
        <div @click.away="isModalDeleteOpen = false" x-show="isModalDeleteOpen" x-transition class="relative bg-white rounded-lg shadow-xl w-full max-w-md text-center p-6">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-5">Hapus Pemasukan</h3>
            <p class="text-sm text-gray-500 mt-2">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            <form :action="deleteUrl" method="POST" class="mt-6 flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" @click="isModalDeleteOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 w-full">Batal</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 w-full">Hapus</button>
            </form>
        </div>
    </div>
</div>

{{-- Hapus script lama karena sudah ditangani Alpine.js --}}
@endsection

