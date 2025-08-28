@extends('layouts.app')

@section('content')

<div class="p-6 bg-white rounded-lg shadow-md mt-14">
  <!-- Judul & Filter -->
  <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4">
    <h2 class="text-lg font-semibold text-gray-800 mb-2 sm:mb-0">Buku Besar (General Ledger)</h2>
    
    {{-- Filter ini bisa diaktifkan nanti jika diperlukan --}}
    {{-- 
    <form method="GET" action="..." class="flex items-center space-x-2">
      <input type="month" name="bulan" class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">
      <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md shadow">
        Filter
      </button>
    </form>
    --}}
  </div>

  <!-- Tombol Ekspor -->
  <div class="flex gap-2 mb-4">
    <a href="{{route ('admin.buku.export.pdf')}}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md shadow transition">
      Ekspor PDF
    </a>
    <a href="{{route ('admin.buku.export.csv')}}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow transition">
      Ekspor CSV
    </a>
  </div>

  <!-- Tabel -->
  <div class="overflow-x-auto rounded-lg border border-gray-200">
    <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="bg-sky-100 text-sky-800 text-xs uppercase tracking-wider">
                <th class="px-4 py-3 border text-center">Tanggal</th>
                <th class="px-4 py-3 border text-left">Keterangan</th>
                <th class="px-4 py-3 border text-center">Debit</th>
                <th class="px-4 py-3 border text-center">Kredit</th>
                <th class="px-4 py-3 border text-center">Saldo</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {{-- Menggunakan variabel $bukuBesar dari controller --}}
            @forelse ($bukuBesar as $item)
                <tr class="hover:bg-gray-50 transition">
                    {{-- Mengakses data menggunakan sintaks objek -> --}}
                    <td class="px-4 py-2 text-center whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->keterangan }}</td>
                    <td class="px-4 py-2 text-right text-green-600 font-semibold">
                        {{-- Menampilkan debit jika lebih dari 0 --}}
                        @if ($item->debit > 0)
                            Rp {{ number_format($item->debit, 2, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right text-red-600 font-semibold">
                        {{-- Menampilkan kredit jika lebih dari 0 --}}
                        @if ($item->kredit > 0)
                            Rp {{ number_format($item->kredit, 2, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right font-bold text-gray-800">
                        Rp {{ number_format($item->saldo, 2, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>

  <!-- Pagination (Dihapus karena controller belum menggunakan pagination) -->
  {{-- 
  <div class="mt-4 flex justify-center">
    ...
  </div>
</div>

@endsection
