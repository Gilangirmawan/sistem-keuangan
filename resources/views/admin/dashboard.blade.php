@extends('layouts.app')

@section('content')
<div x-data="{ isModalOpen: false }" class="p-6 mt-10">
    
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h1>
        <p class="text-gray-500">Berikut adalah ringkasan aktivitas keuangan Anda.</p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

        <div class="lg:col-span-3 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Keuangan</h2>
            
            <div class="bg-gradient-to-r from-[#01c350] to-[#009588] text-white rounded-xl p-6 mb-6 shadow-lg flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Sisa Saldo Terkini</p>
                    <p class="text-3xl font-bold tracking-tight">
                        Rp {{ number_format($sisaSaldo < 0 ? 0 : $sisaSaldo, 0, ',', '.') }}
                    </p>
                </div>
                <i class="fas fa-wallet text-4xl opacity-70"></i>
            </div>

            <div>
                <canvas id="incomeChart" style="height:300px"></canvas>
                <p class="text-center text-sm mt-3 text-gray-600">Grafik Pemasukan vs Pengeluaran per Bulan</p>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Transaksi Terbaru</h2>
                <button @click="isModalOpen = true"
                   class="bg-[#01c350] hover:bg-[#00ad75] text-white px-3 py-2 rounded-lg shadow-md transition-colors text-sm font-semibold flex items-center gap-2">
                   <i class="fa-solid fa-plus"></i>
                    <span>Buat</span>
                </button>
            </div>

            <div class="flex-grow overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="text-xs text-gray-500 uppercase">
                        <tr>
                            <th class="py-3">Keterangan</th>
                            <th class="py-3 text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksiTerbaru as $transaksi)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3">
                                    <p class="font-medium text-gray-800">{{ $transaksi->kategori->nama_kategori ?? 'Tanpa Kategori' }}</p>
                                    <span class="text-xs {{ $transaksi->jenis_transaksi == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ ucfirst($transaksi->jenis_transaksi) }} &bull; {{ $transaksi->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td class="py-3 text-right font-semibold text-gray-800">
                                    Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-10 text-center text-gray-500">
                                    <i class="fa-solid fa-folder-open text-3xl mb-2"></i>
                                    <p>Belum ada transaksi.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-center">
                 <a href="{{ route('admin.laba.index') }}" class="w-full inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-sm py-2 px-4 rounded-lg transition-colors">
                    Lihat Semua Transaksi
                </a>
            </div>
        </div>
    </div>

    <div 
        x-show="isModalOpen"
        @keydown.escape.window="isModalOpen = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
        aria-labelledby="modal-title" role="dialog" aria-modal="true"
    >
        <div
            @click.away="isModalOpen = false"
            x-show="isModalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="bg-white rounded-xl shadow-xl p-6 w-full max-w-lg mx-4"
        >
            <div class="flex justify-between items-center mb-5">
                <h3 id="modal-title" class="text-xl font-bold text-gray-800">Pilih Jenis Transaksi</h3>
                <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-700 transition-colors">
                    <i class="fa-solid fa-times fa-lg"></i>
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