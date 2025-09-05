@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-6 mt-20 px-6">
    <!-- Card Sisa Saldo & Grafik -->
    <div class="bg-white rounded-xl shadow p-5 flex-1">
        <h2 class="text-lg font-semibold mb-4">Ringkasan Keuangan</h2>
        
        <!-- Saldo Card -->
<div class="bg-gradient-to-r from-[#00a84f] to-[#00d66f] text-white rounded-xl p-4 mb-4 flex justify-between items-start">
    <div>
        <p class="text-sm opacity-80">Sisa Saldo Terkini</p>
        <p class="text-3xl font-bold">
            Rp {{ number_format($sisaSaldo < 0 ? 0 : $sisaSaldo, 0, ',', '.') }}
        </p>
    </div>
    <div>
        <i class="fas fa-wallet text-3xl"></i>
    </div>
</div>


        <!-- Chart -->
        <div class="mt-6 bg-white p-4 rounded-lg shadow">
            <canvas id="incomeChart" style="height:300px"></canvas>
            <p class="text-center text-sm mt-2 text-gray-600">Pemasukan vs Pengeluaran per Bulan</p>
        </div>
    </div>

    <!-- Card Transaksi Terbaru -->
    <div class="bg-white rounded-xl shadow p-5 flex-1">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Transaksi Terbaru</h2>
            <a href="{{ route('admin.transaksi.create') }}" class="bg-black text-white px-3 py-1 rounded hover:bg-green-500 text-sm">
                + Buat Transaksi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-xs uppercase">
                        <th class="p-2">Keterangan</th>
                        <th class="p-2">Tanggal</th>
                        <th class="p-2 text-right">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksiTerbaru as $transaksi)
                        <tr class="border-b">
                            <td class="p-2">
                                <p class="font-medium">{{ $transaksi->kategori->nama_kategori ?? 'Tanpa Kategori' }}</p>
                                <span class="text-sm {{ $transaksi->jenis_transaksi == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ ucfirst($transaksi->jenis_transaksi) }}
                                </span>
                            </td>
                            <td class="p-2 text-sm text-gray-500">{{ $transaksi->created_at->diffForHumans() }}</td>
                            <td class="p-2 text-right font-semibold">
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

        <a href="{{ route('admin.transaksi.index') }}" class="mt-4 block text-sky-500 text-sm cursor-pointer hover:underline text-center">
            Lihat Semua Transaksi
        </a>
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
                    backgroundColor: 'rgba(34,197,94, 0.8)'
                },
                {
                    label: 'Pengeluaran',
                    data: @json($pengeluaranPerBulan),
                    backgroundColor: 'rgba(239,68,68, 0.8)'
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
