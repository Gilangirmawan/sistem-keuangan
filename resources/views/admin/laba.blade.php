@extends('layouts.app')

@section('title', 'Laporan Laba Rugi')

@section('content')
<div class="p-4 md:p-6 mt-14">

    <!-- Header Halaman -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Laporan Laba Rugi</h2>
        <p class="text-gray-500">Analisis pendapatan dan pengeluaran dalam periode tertentu.</p>
    </div>

    <!-- Kontrol Filter dan Ekspor -->
    <div class="bg-white p-4 rounded-xl shadow-md mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Form Filter -->
            <form action="{{ route('admin.laba.index') }}" method="GET" class="flex flex-col sm:flex-row sm:items-center gap-2">
                <select name="bulan" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm text-sm focus:ring-green-500 focus:border-green-500">
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}" {{ $bulan == $m ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($m)->isoFormat('MMMM') }}
                        </option>
                    @endfor
                </select>
                <select name="tahun" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm text-sm focus:ring-green-500 focus:border-green-500">
                    @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                        <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
                <button type="submit" class="w-full sm:w-auto bg-[#01c350] hover:bg-[#00ad75] text-white font-bold px-4 py-2 rounded-lg shadow-md transition-colors duration-200 text-sm">
                    Filter
                </button>
            </form>
        </div>
    </div>

    <!-- Kartu Ringkasan Laba Rugi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total Pemasukan -->
        <div class="bg-green-50 p-6 rounded-xl border border-green-200">
            <div class="flex items-center gap-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fa-solid fa-arrow-down text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-green-700">Total Pemasukan</p>
                    <p class="text-2xl font-bold text-green-800">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <!-- Total Pengeluaran -->
        <div class="bg-red-50 p-6 rounded-xl border border-red-200">
            <div class="flex items-center gap-4">
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fa-solid fa-arrow-up text-red-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-red-700">Total Pengeluaran</p>
                    <p class="text-2xl font-bold text-red-800">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <!-- Laba Bersih -->
        <div class="{{ $labaBersih >= 0 ? 'bg-blue-50 border-blue-200' : 'bg-orange-50 border-orange-200' }} p-6 rounded-xl border">
             <div class="flex items-center gap-4">
                <div class="{{ $labaBersih >= 0 ? 'bg-blue-100' : 'bg-orange-100' }} p-3 rounded-full">
                    <i class="fa-solid {{ $labaBersih >= 0 ? 'fa-scale-balanced text-blue-600' : 'fa-chart-line-down text-orange-600' }} text-xl"></i>
                </div>
                <div>
                    <p class="text-sm {{ $labaBersih >= 0 ? 'text-blue-700' : 'text-orange-700' }}">Laba / Rugi Bersih</p>
                    <p class="text-2xl font-bold {{ $labaBersih >= 0 ? 'text-blue-800' : 'text-orange-800' }}">Rp {{ number_format($labaBersih, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Utama: Card dengan Tabel Rincian -->
    <div class="bg-white rounded-xl shadow-md">
        <div class="p-4 border-b flex justify-between items-center">
            {{-- PERBAIKAN ERROR CARBON ADA DI SINI --}}
            <h3 class="text-lg font-semibold text-gray-700">Rincian Transaksi - {{ \Carbon\Carbon::create()->month((int)$bulan)->isoFormat('MMMM') }} {{ $tahun }}</h3>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Keterangan</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3 text-right">Pemasukan</th>
                        <th class="px-6 py-3 text-right">Pengeluaran</th>
                    </tr>
                </thead>
                <tbody class="md:divide-y md:divide-gray-200">
                    @forelse($laporan as $item)
                        <tr class="block md:table-row mb-4 md:mb-0 border shadow-md md:shadow-none md:border-none rounded-lg md:rounded-none">
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 font-medium text-gray-900 border-b md:border-none">
                                <span class="font-bold md:hidden">Tanggal: </span>{{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 border-b md:border-none">
                                <span class="font-bold md:hidden">Keterangan: </span>{{ $item->keterangan ?? '-' }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 border-b md:border-none">
                                <span class="font-bold md:hidden">Kategori: </span>{{ $item->kategori->nama_kategori ?? '-' }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right border-b md:border-none">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Pemasukan: </span>
                                @if($item->jenis_transaksi == 'pemasukan')
                                    <span class="font-semibold text-green-600">Rp {{ number_format($item->total, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Pengeluaran: </span>
                                @if($item->jenis_transaksi == 'pengeluaran')
                                    <span class="font-semibold text-red-600">Rp {{ number_format($item->total, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500">
                                <i class="fa-solid fa-folder-open text-3xl mb-2"></i>
                                <p>Tidak ada data transaksi untuk periode ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">
            {{ $laporan->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

