<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Penjualan Produk', 'jenis' => 'pemasukan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Investasi', 'jenis' => 'pemasukan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Hibah', 'jenis' => 'pemasukan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Gaji Karyawan', 'jenis' => 'pengeluaran', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Operasional Kantor', 'jenis' => 'pengeluaran', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pembelian Stok', 'jenis' => 'pengeluaran', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
