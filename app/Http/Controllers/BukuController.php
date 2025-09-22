<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; // Diperbaiki: Menggunakan namespace lengkap

class BukuController extends Controller
{

    public function index(Request $request)
    {
        $perPage = 15; // Jumlah item per halaman
        $currentPage = $request->input('page', 1);

        $offset = ($currentPage - 1) * $perPage;
        $transaksiSebelumnya = Transaksi::orderBy('created_at', 'asc')->take($offset)->get();

        $saldoAwal = 0;
        foreach ($transaksiSebelumnya as $transaksi) {
            if ($transaksi->jenis_transaksi == 'pemasukan') {
                $saldoAwal += $transaksi->jumlah;
            } else {
                $saldoAwal -= $transaksi->jumlah;
            }
        }

        $semuaTransaksi = Transaksi::with('kategori')->orderBy('created_at', 'asc')->paginate($perPage);

        $saldo = $saldoAwal;
        $bukuBesar = $semuaTransaksi->map(function ($item) use (&$saldo) {
            $debit = ($item->jenis_transaksi == 'pemasukan') ? $item->total : 0;
            $kredit = ($item->jenis_transaksi == 'pengeluaran') ? $item->total : 0;

            $saldo += $debit - $kredit;

            return (object) [
                'tanggal'    => $item->created_at,
                'keterangan' => ucfirst($item->jenis_transaksi) . ' - ' . ($item->kategori->nama_kategori ?? 'Lainnya'),
                'debit'      => $debit,
                'kredit'     => $kredit,
                'saldo'      => $saldo,
            ];
        });

        return view('admin.buku', compact('bukuBesar', 'semuaTransaksi'));
    }

    public function exportPdf()
    {
        $semuaTransaksi = Transaksi::with('kategori')->orderBy('created_at', 'asc')->get();

        $saldo = 0;
        $bukuBesar = $semuaTransaksi->map(function ($item) use (&$saldo) {
            $debit = ($item->jenis_transaksi == 'pemasukan') ? $item->total : 0;
            $kredit = ($item->jenis_transaksi == 'pengeluaran') ? $item->total : 0;

            $saldo += $debit - $kredit;

            return (object) [
                'tanggal'    => $item->created_at,
                'keterangan' => $item->keterangan ?? (ucfirst($item->jenis_transaksi) . ' - ' . ($item->kategori->nama_kategori ?? 'Lainnya')),
                'debit'      => $debit,
                'kredit'     => $kredit,
                'saldo'      => $saldo,
            ];
        });

        $pdf = Pdf::loadView('admin\buku-pdf', compact('bukuBesar'));

        $namaFile = 'laporan-buku-besar-' . Carbon::now()->format('d-m-Y') . '.pdf';

        return $pdf->stream($namaFile);
    }


    public function exportCsv()
    {
        $namaFile = 'laporan-buku-besar-' . Carbon::now()->format('d-m-Y') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $namaFile . '"',
        ];

        $semuaTransaksi = Transaksi::with('kategori')->orderBy('created_at', 'asc')->get();

        $callback = function () use ($semuaTransaksi) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Tanggal', 'Keterangan', 'Debit', 'Kredit', 'Saldo']);

            $saldo = 0;
            foreach ($semuaTransaksi as $item) {
                $debit = ($item->jenis_transaksi == 'pemasukan') ? $item->total : 0;
                $kredit = ($item->jenis_transaksi == 'pengeluaran') ? $item->total : 0;
                $saldo += $debit - $kredit;

                fputcsv($file, [
                    Carbon::parse($item->created_at)->format('d-m-Y H:i:s'),
                    $item->keterangan ?? (ucfirst($item->jenis_transaksi) . ' - ' . ($item->kategori->nama_kategori ?? 'Lainnya')),
                    $debit,
                    $kredit,
                    $saldo
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
