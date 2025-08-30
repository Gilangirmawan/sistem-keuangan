<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung Sisa Saldo Terkini
        $totalPemasukan = Transaksi::where('jenis_transaksi', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = Transaksi::where('jenis_transaksi', 'pengeluaran')->sum('jumlah');
        $sisaSaldo = $totalPemasukan - $totalPengeluaran;

        // 2. Mengambil data untuk Grafik (Income vs Expense per Bulan)
        $tahunIni = Carbon::now()->year;

        // Inisialisasi array 12 bulan dengan nilai 0
        $pemasukanPerBulan = array_fill(0, 12, 0);
        $pengeluaranPerBulan = array_fill(0, 12, 0);

        $transaksiTahunIni = Transaksi::whereYear('created_at', $tahunIni)
            ->select(
                DB::raw('MONTH(created_at) as bulan'),
                'jenis_transaksi',
                DB::raw('SUM(jumlah) as total')
            )
            ->groupBy('bulan', 'jenis_transaksi')
            ->get();

        foreach ($transaksiTahunIni as $transaksi) {
            $bulanIndex = $transaksi->bulan - 1; // Array index mulai dari 0
            if ($transaksi->jenis_transaksi == 'pemasukan') {
                $pemasukanPerBulan[$bulanIndex] = $transaksi->total;
            } else {
                $pengeluaranPerBulan[$bulanIndex] = $transaksi->total;
            }
        }
        
        // 3. Mengambil 5 Transaksi Terbaru
        $transaksiTerbaru = Transaksi::with('kategori')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'sisaSaldo',
            'pemasukanPerBulan',
            'pengeluaranPerBulan',
            'transaksiTerbaru'
        ));
    }
}
