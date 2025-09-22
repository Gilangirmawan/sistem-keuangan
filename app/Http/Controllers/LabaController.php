<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LabaController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        $query = Transaksi::whereYear('created_at', $tahun)
                          ->whereMonth('created_at', $bulan);

        // Hitung total pemasukan dan pengeluaran dari semua data yang difilter
        $totalPemasukan = (clone $query)->where('jenis_transaksi', 'pemasukan')->sum('total');
        $totalPengeluaran = (clone $query)->where('jenis_transaksi', 'pengeluaran')->sum('total');

        $laporan = (clone $query)->with('kategori')
                                 ->latest()
                                 ->paginate(5);

        $labaBersih = $totalPemasukan - $totalPengeluaran;

        return view('admin.laba', compact(
            'laporan',
            'totalPemasukan',
            'totalPengeluaran',
            'labaBersih',
            'bulan',
            'tahun'
        ));
    }
}
