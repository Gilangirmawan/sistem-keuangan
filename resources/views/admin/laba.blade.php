@extends('layouts.app')

@section('title', 'Laporan Laba Rugi')

@section('content')
<div class="p-6">

    {{-- Header + Filter --}}
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 mt-11">
        <h2 class="text-lg font-semibold mb-2 sm:mb-0">Laporan Laba Rugi</h2>
        
        <form action="{{ route('admin.laba.index') }}" method="GET" class="flex items-center gap-2">
            <select name="bulan" class="border rounded-lg px-3 py-2 text-sm shadow-sm focus:border-black focus:ring-black">
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create()->month($m)->isoFormat('MMMM') }}
                    </option>
                @endfor
            </select>
            <select name="tahun" class="border rounded-lg px-3 py-2 text-sm shadow-sm focus:border-black focus:ring-black">
                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                    <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
            <button type="submit" class="bg-black hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow text-sm">
                Filter
            </button>
        </form>
    </div>

    {{-- Tabel Laporan --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Keterangan</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3 text-right">Pemasukan</th>
                    <th class="px-6 py-3 text-right">Pengeluaran</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($laporan as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-600">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ $item->keterangan ?? '-' }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td class="px-6 py-4 text-right">
                        @if($item->jenis_transaksi == 'pemasukan')
                            <span class="font-semibold text-green-600">Rp {{ number_format($item->total, 0, ',', '.') }}</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if($item->jenis_transaksi == 'pengeluaran')
                             <span class="font-semibold text-red-600">Rp {{ number_format($item->total, 0, ',', '.') }}</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-10 text-gray-500">Tidak ada data transaksi untuk periode ini.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-gray-50 font-bold">
                <tr>
                    <td colspan="3" class="px-6 py-3 text-right">Total Periode Ini</td>
                    <td class="px-6 py-3 text-right text-green-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                    <td class="px-6 py-3 text-right text-red-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="px-6 py-4 text-right text-base">Laba Bersih</td>
                    <td colspan="2" class="px-6 py-4 text-right text-base {{ $labaBersih >= 0 ? 'text-blue-600' : 'text-red-600' }}">
                        Rp {{ number_format($labaBersih, 0, ',', '.') }}
                        <span class="ml-2 inline-flex items-center rounded-full px-2.5 py-1 text-xs ring-1 ring-inset {{ $labaBersih >= 0 ? 'bg-blue-100 text-blue-700 ring-blue-200' : 'bg-red-100 text-red-700 ring-red-200' }}">
                            {{ $labaBersih >= 0 ? 'Profit' : 'Loss' }}
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    
 
    <div class="mt-4">
        {{ $laporan->appends(request()->query())->links() }}
    </div>
</div>
@endsection
