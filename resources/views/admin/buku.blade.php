@extends('layouts.app')

@section('title', 'Buku Besar')

@section('content')
<div class="p-4 md:p-6 mt-14">

    <!-- Header Halaman -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Buku Besar (General Ledger)</h2>
        <p class="text-gray-500">Rincian lengkap semua transaksi yang tercatat dalam sistem.</p>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-md mb-6">
        <div class="space-y-4">
            <!-- Filter -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Filter Laporan</h3>
                <form action="{{ route('admin.buku.index') }}" method="GET" class="flex flex-col sm:flex-row sm:items-center gap-2 mt-2">
                    <select name="bulan" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm text-sm focus:ring-green-500 focus:border-green-500">
                        <option value="">Semua Bulan</option>
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->isoFormat('MMMM') }}
                            </option>
                        @endfor
                    </select>
                    <select name="tahun" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm text-sm focus:ring-green-500 focus:border-green-500">
                        @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                            <option value="{{ $y }}" {{ request('tahun', date('Y')) == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="w-full sm:w-auto bg-[#01c350] hover:bg-[#00ad75] text-white font-bold px-4 py-2 rounded-lg shadow-md transition-colors duration-200 text-sm">
                        Terapkan Filter
                    </button>
                </form>
            </div>
            
            <hr>

            <!-- Ekspor -->
            <div>
                 <h3 class="text-lg font-semibold text-gray-700">Opsi Ekspor</h3>
                 <p class="text-sm text-gray-500 mb-2">Ekspor data (sesuai filter) ke format lain.</p>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.buku.export.pdf', request()->query()) }}" class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition-colors">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>PDF</span>
                    </a>
                    <a href="{{ route('admin.buku.export.csv', request()->query()) }}" class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 transition-colors">
                        <i class="fa-solid fa-file-csv"></i>
                        <span>CSV</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md">
        <div class="p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-700">Rincian Transaksi</h3>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Keterangan</th>
                        <th class="px-6 py-3 text-right">Debit</th>
                        <th class="px-6 py-3 text-right">Kredit</th>
                        <th class="px-6 py-3 text-right">Saldo</th>
                    </tr>
                </thead>
                <tbody class="md:divide-y md:divide-gray-200">
                    @forelse($bukuBesar as $item)
                        <tr class="block md:table-row mb-4 md:mb-0 border shadow-md md:shadow-none md:border-none rounded-lg md:rounded-none">
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 font-medium text-gray-900 border-b md:border-none">
                                <span class="font-bold md:hidden">Tanggal: </span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y, H:i') }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 border-b md:border-none">
                                <span class="font-bold md:hidden">Keterangan: </span>{{ $item->keterangan }}
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right border-b md:border-none">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Debit: </span>
                                @if ($item->debit > 0)
                                    <span class="font-semibold text-green-600">Rp {{ number_format($item->debit, 2, ',', '.') }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right border-b md:border-none">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Kredit: </span>
                                @if ($item->kredit > 0)
                                    <span class="font-semibold text-red-600">Rp {{ number_format($item->kredit, 2, ',', '.') }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="block md:table-cell p-4 md:px-6 md:py-4 text-right font-bold text-gray-800">
                                <span class="font-bold md:hidden text-gray-500 font-normal float-left">Saldo: </span>
                                Rp {{ number_format($item->saldo, 2, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500">
                                <i class="fa-solid fa-folder-open text-3xl mb-2"></i>
                                <p>Tidak ada data transaksi untuk ditampilkan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">
            {{ $semuaTransaksi->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

