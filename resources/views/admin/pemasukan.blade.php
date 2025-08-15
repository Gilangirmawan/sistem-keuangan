<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')


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
