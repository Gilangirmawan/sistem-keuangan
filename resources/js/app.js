import './bootstrap';
import '../css/app.css';


import Chart from 'chart.js/auto';

// Chart Income vs Expense
const ctx = document.getElementById('incomeExpenseChart');
if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'Income',
                    data: [1200, 1500, 1400, 1800, 1700, 2000],
                    backgroundColor: 'rgba(59, 130, 246, 0.8)', // biru
                    borderRadius: 5
                },
                {
                    label: 'Expense',
                    data: [800, 1100, 1000, 1300, 1200, 1400],
                    backgroundColor: 'rgba(239, 68, 68, 0.8)', // merah
                    borderRadius: 5
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
