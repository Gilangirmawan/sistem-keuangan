<!-- resources/views/admin/kategori.blade.php -->
@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4 mt-11">
        <h2 class="text-lg font-semibold">Manajemen Kategori (Pemasukan)</h2>
        <button onclick="document.getElementById('modalKategori').classList.remove('hidden')" 
                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Data Kategori
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Kategori</th>
                    <th class="px-4 py-2 border">Jenis</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $item->nama }}</td>
                        <td class="px-4 py-2 border">{{ ucfirst($item->jenis) }}</td>
                        <td class="px-4 py-2 border">
                            <span class="px-2 py-1 text-xs rounded 
                                {{ $item->status == 'aktif' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">✏️</a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-3">Belum ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div id="modalKategori" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Tambah Data Kategori</h3>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block">Nama Kategori</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Jenis</label>
                <select name="jenis" class="w-full border rounded px-3 py-2">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('modalKategori').classList.add('hidden')" class="px-4 py-2 bg-gray-400 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
