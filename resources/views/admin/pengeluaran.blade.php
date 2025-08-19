@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center mb-3 mt-11">
        <h2 class="text-lg font-semibold">Pencatatan Pengeluaran</h2>
        <button onclick="toggleModal(true)" 
                class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-lg shadow">
            + Tambah Data Pengeluaran
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 text-sm text-left">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                   <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Keterangan</th>
                    <th class="border px-3 py-2">Jenis</th>
                    <th class="border px-3 py-2">Jumlah</th>
                    <th class="border px-3 py-2">Total</th>
                    <th class="border px-3 py-2">Tanggal</th>
                    <th class="border px-3 py-2">Bukti Transaksi</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengeluaran as $item)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-3 py-2">{{ $item->pengeluaran }}</td>
                    <td class="border px-3 py-2">{{ $item->kategori }}</td>
                    <td class="border px-3 py-2">Rp {{ number_format($item->jumlah,0,',','.') }}</td>
                    <td class="border px-3 py-2">{{ $item->keterangan }}</td>
                    <td class="border px-3 py-2">{{ $item->keterangan }}</td>
                    <td class="border px-3 py-2">{{ $item->keterangan }}</td>
                    <td class="border px-3 py-2">
                        <div class="flex gap-2">
                            <form action="{{ route('pengeluaran.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('pengeluaran.edit',$item->id) }}" 
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-3 text-gray-500">Belum ada data pengeluaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Tambah Data Pengeluaran</h2>

        <form action="{{ route('pengeluaran.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Keterangan</label>
                <input type="text" name="pemasukan" class="w-full mt-1 border rounded px-3 py-2 focus:outline-sky-500" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Jenis</label>
                <select name="kategori" class="w-full mt-1 border rounded px-3 py-2 focus:outline-sky-500" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Gaji">Gaji</option>
                    <option value="Bonus">Bonus</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Jumlah</label>
                <input type="number" name="jumlah" class="w-full mt-1 border rounded px-3 py-2 focus:outline-sky-500" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date">
            </div>

            <div>
                <label class="block text-sm font-medium">Bukti Transaksi</label>
                <input type="file" name="Bukti" class="w-full mt-1 border rounded px-3 py-2 focus:outline-sky-500" required>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal(false)" 
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {
        document.getElementById('modal').style.display = show ? 'flex' : 'none';
    }
</script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
