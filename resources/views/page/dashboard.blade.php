<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-6 mt-20 px-6">
    <!-- Card Sisa Saldo -->
    <div class="bg-white rounded-xl shadow p-5 flex-1">
        <h2 class="text-lg font-semibold mb-4">Sisa Saldo Terkini</h2>
        
        <!-- Saldo Card -->
        <div class="bg-gradient-to-r from-sky-400 to-sky-600 text-white rounded-xl p-4 mb-4 flex justify-between items-start">
            <div>
                <p class="text-sm opacity-80">Total Balance</p>
                <p class="text-3xl font-bold">$ 5,254<span class="text-lg">,50</span></p>
                <p class="mt-2 text-sm">**** 123-456-7890</p>
            </div>
            <div>
                <i class="fas fa-wallet text-3xl"></i>
                <p class="text-xs mt-2 opacity-80">April 2028</p>
            </div>
        </div>

        <!-- Chart Placeholder -->
       <div class="mt-6 bg-white p-4 rounded-lg shadow">
    <canvas id="incomeChart" class="w-full h-64"></canvas>
    <p class="text-center text-sm mt-2 text-gray-600">Income vs Expense per Bulan</p>
</div>

<!-- Tambahkan Chart.js -->
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
                    label: 'Income',
                    data: [1200000, 1500000, 1000000, 1800000, 1400000, 1700000, 1600000, 2000000, 1900000, 2100000, 2200000, 2500000],
                    backgroundColor: 'rgba(34,197,94, 0.8)',
                },
                {
                    label: 'Expense',
                    data: [800000, 1200000, 900000, 1000000, 1100000, 1300000, 1000000, 1500000, 1400000, 1600000, 1500000, 1700000],
                    backgroundColor: 'rgba(239,68,68, 0.8)',
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

    </div>

    <!-- Card Pemasukan & Pengeluaran -->
    <div class="bg-white rounded-xl shadow p-5 flex-1">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Pemasukan & Pengeluaran</h2>
            <div class="flex gap-2">
                <button class="bg-sky-500 text-white px-3 py-1 rounded hover:bg-sky-600">Buat Transaksi Baru</button>
                <button class="bg-sky-500 text-white px-3 py-1 rounded hover:bg-sky-600">Bulan/Tahun</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">Purpose</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Amount</th>
                        <th class="p-2">Result</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="font-medium">Fauget Cafe</p>
                            <span class="text-sm text-gray-500">Coffee Shop</span>
                        </td>
                        <td class="p-2">Today <span class="text-xs text-gray-500">2m ago</span></td>
                        <td class="p-2">$ 500</td>
                        <td class="p-2 text-sky-500">Done</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="font-medium">Claudia Store</p>
                            <span class="text-sm text-gray-500">Accessories</span>
                        </td>
                        <td class="p-2">Today <span class="text-xs text-gray-500">5m ago</span></td>
                        <td class="p-2">$ 1,000</td>
                        <td class="p-2 text-sky-500">Done</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="font-medium">Chidi Barber</p>
                            <span class="text-sm text-gray-500">Barber Shop</span>
                        </td>
                        <td class="p-2">Today <span class="text-xs text-gray-500">1h ago</span></td>
                        <td class="p-2">$ 500</td>
                        <td class="p-2 text-sky-500">Done</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="font-medium">Cahaya Dewi</p>
                            <span class="text-sm text-gray-500">Bank Account</span>
                        </td>
                        <td class="p-2">Today <span class="text-xs text-gray-500">2h ago</span></td>
                        <td class="p-2">$ 1,000</td>
                        <td class="p-2 text-yellow-500">Pending</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="font-medium">Yael Amari</p>
                            <span class="text-sm text-gray-500">Bank Account</span>
                        </td>
                        <td class="p-2">Yesterday <span class="text-xs text-gray-500">09:00 AM</span></td>
                        <td class="p-2">$ 500</td>
                        <td class="p-2 text-sky-500">Done</td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            <p class="font-medium">Larana, Inc.</p>
                            <span class="text-sm text-gray-500">Hotel</span>
                        </td>
                        <td class="p-2">Yesterday <span class="text-xs text-gray-500">08:00 AM</span></td>
                        <td class="p-2">$ 1,000</td>
                        <td class="p-2 text-sky-500">Done</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="mt-3 text-sky-500 text-sm cursor-pointer hover:underline">Lihat Semua Pengeluaran & Pemasukan</p>
    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js -->
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
                    label: 'Income',
                    data: [12000000, 15000000, 10000000, 18000000, 20000000, 17000000, 19000000, 21000000, 15000000, 16000000, 22000000, 25000000],
                    backgroundColor: 'rgba(34,197,94, 0.8)', // Hijau
                },
                {
                    label: 'Expense',
                    data: [8000000, 9000000, 7000000, 12000000, 13000000, 11000000, 15000000, 14000000, 10000000, 9000000, 17000000, 18000000],
                    backgroundColor: 'rgba(239,68,68, 0.8)', // Merah
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
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
