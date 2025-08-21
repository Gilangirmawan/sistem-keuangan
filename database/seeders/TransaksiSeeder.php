<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriPemasukan = [1, 2, 3]; // ID kategori untuk pemasukan
        $kategoriPengeluaran = [4, 5, 6]; // ID kategori untuk pengeluaran

        $keteranganPemasukan = [
            'Penjualan produk A',
            'Penjualan produk B',
            'Pendapatan jasa servis',
            'Pembayaran dari pelanggan',
            'Bonus penjualan',
            'Pendapatan lain-lain',
            'Hasil penjualan online',
            'Uang muka pelanggan',
            'Hasil penjualan grosir',
            'Hasil penjualan eceran',
            'Pendapatan dari kerjasama',
            'Royalti penjualan',
            'Komisi penjualan'
        ];

        $keteranganPengeluaran = [
            'Biaya listrik',
            'Biaya sewa toko',
            'Gaji karyawan',
            'Biaya internet',
            'Pembelian peralatan kantor',
            'Pembelian bahan baku',
            'Biaya transportasi',
            'Biaya pemasaran',
            'Biaya maintenance',
            'Pajak bulanan',
            'Biaya administrasi',
            'Asuransi usaha',
            'Biaya lain-lain',
            'Biaya kebersihan',
            'Biaya keamanan',
            'Biaya langganan software',
            'Biaya pelatihan karyawan',
            'Biaya pengiriman'
        ];

        $data = [];

        for ($i = 1; $i <= 31; $i++) {
            $isPemasukan = rand(0, 1); // Random antara pemasukan atau pengeluaran
            if ($isPemasukan) {
                $jenis = 'pemasukan';
                $id_kategori = $kategoriPemasukan[array_rand($kategoriPemasukan)];
                $keterangan = $keteranganPemasukan[array_rand($keteranganPemasukan)];
            } else {
                $jenis = 'pengeluaran';
                $id_kategori = $kategoriPengeluaran[array_rand($kategoriPengeluaran)];
                $keterangan = $keteranganPengeluaran[array_rand($keteranganPengeluaran)];
            }

            $jumlah = rand(50000, 1000000);
            $total = $jumlah + rand(-5000, 10000);
            $status = $total >= $jumlah ? 'profit' : 'loss';

            $data[] = [
                'jenis_transaksi' => $jenis,
                'id_kategori' => $id_kategori,
                'jumlah' => $jumlah,
                'total' => $total,
                'total_laba' => $total - $jumlah,
                'status' => $status,
                'bukti_transaksi' => 'bukti/'.Str::random(10).'.png',
                'keterangan' => $keterangan,
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now()
            ];
        }

        DB::table('transaksi')->insert($data);
    }
}
