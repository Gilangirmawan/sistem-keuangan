<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; // Diperbaiki: Menggunakan namespace lengkap

class BukuController extends Controller
{
    /**
     * Menampilkan halaman buku besar dengan pagination.
     */
    public function index(Request $request)
    {
        $perPage = 15; // Jumlah item per halaman
        $currentPage = $request->input('page', 1);

        // Hitung saldo awal dari halaman-halaman sebelumnya
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

        // Ambil data untuk halaman saat ini menggunakan paginate
        $semuaTransaksi = Transaksi::with('kategori')->orderBy('created_at', 'asc')->paginate($perPage);

        // Inisialisasi saldo dengan saldo awal halaman ini
        $saldo = $saldoAwal;
        // Proses data untuk view
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

    /**
     * Menangani ekspor data buku besar ke PDF.
     */
    public function exportPdf()
    {
        // Ambil semua data tanpa pagination untuk PDF
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

        // Menggunakan Pdf facade yang sudah diimpor dengan benar
        $pdf = Pdf::loadView('admin\buku-pdf', compact('bukuBesar'));

        // Atur nama file PDF yang akan diunduh
        $namaFile = 'laporan-buku-besar-' . Carbon::now()->format('d-m-Y') . '.pdf';

        return $pdf->stream($namaFile);
    }

    /**
     * Menangani ekspor data buku besar ke CSV.
     */
    public function exportCsv()
    {
        $namaFile = 'laporan-buku-besar-' . Carbon::now()->format('d-m-Y') . '.csv';

        // Set header untuk download file
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $namaFile . '"',
        ];

        // Ambil semua data tanpa pagination
        $semuaTransaksi = Transaksi::with('kategori')->orderBy('created_at', 'asc')->get();

        // Callback untuk men-stream data
        $callback = function () use ($semuaTransaksi) {
            $file = fopen('php://output', 'w');

            // Tulis baris header
            fputcsv($file, ['Tanggal', 'Keterangan', 'Debit', 'Kredit', 'Saldo']);

            $saldo = 0;
            foreach ($semuaTransaksi as $item) {
                $debit = ($item->jenis_transaksi == 'pemasukan') ? $item->total : 0;
                $kredit = ($item->jenis_transaksi == 'pengeluaran') ? $item->total : 0;
                $saldo += $debit - $kredit;

                // Tulis baris data
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

        // Kembalikan response sebagai stream
        return response()->stream($callback, 200, $headers);
    }
}
