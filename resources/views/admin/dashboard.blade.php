@extends('layouts.app')

@section('content')
<div x-data="{ isModalOpen: false }" class="flex flex-col lg:flex-row gap-6 mt-20 px-6">
    <div class="bg-white rounded-xl shadow-md p-5 flex-1">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Keuangan</h2>
        
        <div class="bg-gradient-to-r from-[#01c350] to-[#009588] text-white rounded-xl p-5 mb-4 shadow-lg flex justify-between items-start">
            <div>
                <p class="text-sm opacity-80">Sisa Saldo Terkini</p>
                <p class="text-3xl font-bold">
                    Rp {{ number_format($sisaSaldo < 0 ? 0 : $sisaSaldo, 0, ',', '.') }}
                </p>
            </div>
            <div>
                <i class="fas fa-wallet text-3xl opacity-90"></i>
            </div>
        </div>

        <div class="mt-6">
            <canvas id="incomeChart" style="height:300px"></canvas>
            <p class="text-center text-sm mt-2 text-gray-600">Pemasukan vs Pengeluaran per Bulan</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 flex-1">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Transaksi Terbaru</h2>
            
            <button @click="isModalOpen = true"
               class="bg-[#01c350] hover:bg-[#00ad75] text-white px-4 py-2 rounded-lg shadow-md transition-colors text-sm font-semibold">
                + Buat Transaksi
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-xs uppercase text-gray-600">
                        <th class="p-3">Keterangan</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3 text-right">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksiTerbaru as $transaksi)
                        <tr class="border-b">
                            <td class="p-3">
                                <p class="font-medium text-gray-800">{{ $transaksi->kategori->nama_kategori ?? 'Tanpa Kategori' }}</p>
                                <span class="text-sm font-semibold {{ $transaksi->jenis_transaksi == 'pemasukan' ? 'text-[#00ad75]' : 'text-red-600' }}">
                                    {{ ucfirst($transaksi->jenis_transaksi) }}
                                </span>
                            </td>
                            <td class="p-3 text-sm text-gray-500">{{ $transaksi->created_at->diffForHumans() }}</td>
                            <td class="p-3 text-right font-semibold text-gray-800">
                                Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.laba.index') }}" class="mt-4 block text-sky-500 text-sm cursor-pointer hover:underline text-center">
            Lihat Semua Transaksi
        </a>
    </div>

    <div 
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        aria-labelledby="modal-title" role="dialog" aria-modal="true"
    >
        <div
            @click.stop
            x-show="isModalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md mx-4"
        >
            <div class="flex justify-between items-center mb-6">
                <h3 id="modal-title" class="text-xl font-bold text-gray-800">Pilih Jenis Transaksi</h3>
                <button @click="isModalOpen = false" class="text-gray-500 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('admin.pemasukan.index') }}" class="group flex flex-col items-center justify-center p-6 bg-green-50 hover:bg-green-100 border-2 border-dashed border-green-200 rounded-lg text-center transition-colors">
                    <div class="mb-3 text-3xl text-green-500">
                        <i class="fa-solid fa-arrow-down"></i>
                    </div>
                    <p class="font-semibold text-green-800">Tambah Pemasukan</p>
                    <p class="text-xs text-green-600">Catat pendapatan baru</p>
                </a>

                <a href="{{ route('admin.pengeluaran.index') }}" class="group flex flex-col items-center justify-center p-6 bg-red-50 hover:bg-red-100 border-2 border-dashed border-red-200 rounded-lg text-center transition-colors">
                     <div class="mb-3 text-3xl text-red-500">
                        <i class="fa-solid fa-arrow-up"></i>
                    </div>
                    <p class="font-semibold text-red-800">Tambah Pengeluaran</p>
                    <p class="text-xs text-red-600">Catat biaya atau belanja</p>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('incomeChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: 'Pemasukan',
                    data: @json($pemasukanPerBulan),
                    backgroundColor: 'rgba(1, 195, 80, 0.8)', // Warna baru dari #01c350
                    borderColor: 'rgba(1, 195, 80, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                },
                {
                    label: 'Pengeluaran',
                    data: @json($pengeluaranPerBulan),
                    backgroundColor: 'rgba(239, 68, 68, 0.8)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush