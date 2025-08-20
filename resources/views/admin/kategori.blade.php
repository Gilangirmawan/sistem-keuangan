@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4 mt-11">
        <h2 class="text-lg font-semibold">Manajemen Kategori</h2>
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" 
                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Data Kategori
        </button>
    </div>

    <!-- Tabs -->
    <div class="mb-4 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="kategoriTabs" role="tablist">
            <li class="me-2">
                <button class="inline-block p-4 border-b-2 rounded-t-lg active text-blue-600 border-blue-600" 
                        onclick="showTab('pemasukan')">
                    Pemasukan
                </button>
            </li>
            <li class="me-2">
                <button class="inline-block p-4 border-b-2 rounded-t-lg text-gray-500 hover:text-gray-600 hover:border-gray-300" 
                        onclick="showTab('pengeluaran')">
                    Pengeluaran
                </button>
            </li>
        </ul>
    </div>

    <!-- Table Pemasukan -->
    <div id="tab-pemasukan" class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3">Jenis</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($kategori->where('jenis', 'pemasukan') as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-6 py-4">{{ $no++ }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->nama_kategori }}</td>
                    <td class="px-6 py-4">{{ ucfirst($item->jenis) }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <button onclick="openEditModal({{ $item->id }}, '{{ $item->nama_kategori }}', '{{ $item->jenis }}')" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button onclick="openDeleteModal({{ $item->id }})" 
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </td>
                </tr>
                @endforeach
                @if($kategori->where('jenis', 'pemasukan')->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-3">Belum ada data kategori pemasukan.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Table Pengeluaran -->
    <div id="tab-pengeluaran" class="relative overflow-x-auto shadow-md sm:rounded-lg hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3">Jenis</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($kategori->where('jenis', 'pengeluaran') as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-6 py-4">{{ $no++ }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->nama_kategori }}</td>
                    <td class="px-6 py-4">{{ ucfirst($item->jenis) }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <button onclick="openEditModal({{ $item->id }}, '{{ $item->nama_kategori }}', '{{ $item->jenis }}')" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button onclick="openDeleteModal({{ $item->id }})" 
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </td>
                </tr>
                @endforeach
                @if($kategori->where('jenis', 'pengeluaran')->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-3">Belum ada data kategori pengeluaran.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Tambah Data Kategori</h3>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Jenis</label>
                <select name="jenis" class="w-full border rounded px-3 py-2">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
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
        <h3 class="text-lg font-semibold mb-4">Edit Data Kategori</h3>
        <form id="formEdit" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block">Nama Kategori</label>
                <input type="text" id="editNama" name="nama_kategori" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block">Jenis</label>
                <select id="editJenis" name="jenis" class="w-full border rounded px-3 py-2">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
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
        <p class="mb-4">Apakah anda yakin ingin menghapus kategori ini?</p>
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
    function showTab(tab) {
        document.getElementById('tab-pemasukan').classList.add('hidden');
        document.getElementById('tab-pengeluaran').classList.add('hidden');
        document.getElementById('tab-' + tab).classList.remove('hidden');

        let buttons = document.querySelectorAll('#kategoriTabs button');
        buttons.forEach(btn => {
            btn.classList.remove('text-blue-600', 'border-blue-600', 'active');
            btn.classList.add('text-gray-500', 'hover:text-gray-600', 'hover:border-gray-300');
        });
        event.target.classList.add('text-blue-600', 'border-blue-600', 'active');
        event.target.classList.remove('text-gray-500', 'hover:text-gray-600', 'hover:border-gray-300');
    }

    function openEditModal(id, nama, jenis) {
        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('editNama').value = nama;
        document.getElementById('editJenis').value = jenis;
        document.getElementById('formEdit').action = '/kategori/' + id;
    }

    function openDeleteModal(id) {
        document.getElementById('modalDelete').classList.remove('hidden');
        document.getElementById('formDelete').action = '/kategori/' + id;
    }
</script>
@endsection
