@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4 mt-11">
        <h2 class="text-lg font-semibold">Manajemen Pengeluaran</h2>
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" 
                class="bg-black hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Data Pengeluaran
        </button>
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Keterangan</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Jumlah</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Bukti</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; $grandTotal = 0; @endphp
                @foreach($pengeluaran as $item)
                @php $grandTotal += $item->total; @endphp
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-6 py-4">{{ $no++ }}</td>
                    <td class="px-6 py-4">{{ $item->keterangan ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td class="px-6 py-4">{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 font-semibold text-green-600">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        @if($item->bukti_transaksi)
                            <a href="{{ asset('storage/' . $item->bukti_transaksi) }}" target="_blank" 
                               class="text-sky-500 underline">Lihat</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <button onclick="openEditModal({{ $item->id }}, '{{ $item->keterangan }}', '{{ $item->id_kategori }}', '{{ $item->jumlah }}', '{{ $item->total }}')" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded"><i class="fa-solid fa-pencil"></i> Edit</button>
                        <button onclick="openDeleteModal({{ $item->id }})" 
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </td>
                </tr>
                @endforeach
                @if($pengeluaran->isEmpty())
                <tr>
                    <td colspan="8" class="text-center py-3">Belum ada data pengeluaran.</td>
                </tr>
                @endif
            </tbody>
            <tfoot class="bg-gray-50">
                <tr>
                    <td colspan="4" class="px-6 py-3 font-bold text-right">Grand Total</td>
                    <td class="px-6 py-3 font-bold text-green-600">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
        <div class="p-4 ">
    {{ $pengeluaran->links() }}
</div>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Tambah Data Pengeluaran</h3>
        <form action="{{ route('admin.pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-3">
                <label class="block">Kategori</label>
                <select name="id_kategori" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        @if($k->jenis == 'pengeluaran')
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block">Jumlah</label>
                <input type="number" step="0.01" name="jumlah" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Total</label>
                <input type="number" step="0.01" name="total" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Bukti Transaksi</label>
                <input type="file" name="bukti_transaksi" class="w-full border rounded px-3 py-2">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="px-4 py-2 bg-gray-400 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Edit Data Pengeluaran</h3>
        <form id="formEdit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block">Keterangan</label>
                <input type="text" id="editKeterangan" name="keterangan" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-3">
                <label class="block">Kategori</label>
                <select id="editKategori" name="id_kategori" class="w-full border rounded px-3 py-2">
                    @foreach($kategori as $k)
                        @if($k->jenis == 'pengeluaran')
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block">Jumlah</label>
                <input type="number" step="0.01" id="editJumlah" name="jumlah" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Total</label>
                <input type="number" step="0.01" id="editTotal" name="total" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Bukti Transaksi (kosongkan jika tidak diganti)</label>
                <input type="file" name="bukti_transaksi" class="w-full border rounded px-3 py-2">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')" class="px-4 py-2 bg-gray-400 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="modalDelete" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
        <p class="mb-4">Apakah anda yakin ingin menghapus pengeluaran ini?</p>
        <form id="formDelete" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('modalDelete').classList.add('hidden')" class="px-4 py-2 bg-gray-400 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script>
    function openEditModal(id, keterangan, idKategori, jumlah, total) {
        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('editKeterangan').value = keterangan;
        document.getElementById('editKategori').value = idKategori;
        document.getElementById('editJumlah').value = jumlah;
        document.getElementById('editTotal').value = total;
        document.getElementById('formEdit').action = '/pengeluaran/' + id;
    }

    function openDeleteModal(id) {
        document.getElementById('modalDelete').classList.remove('hidden');
        document.getElementById('formDelete').action = '/pengeluaran/' + id;
    }
</script>
@endsection
