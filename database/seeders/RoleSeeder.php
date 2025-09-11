<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // Diperlukan untuk menonaktifkan foreign key

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PERBAIKAN: Nonaktifkan foreign key check sebelum truncate
        Schema::disableForeignKeyConstraints();

        // Menggunakan nama tabel 'role' (singular)
        DB::table('role')->truncate();

        // PERBAIKAN: Aktifkan kembali foreign key check
        Schema::enableForeignKeyConstraints();

        // Menggunakan nama tabel 'role' dan kolom 'role'
        DB::table('role')->insert([
            [
                'role' => 'admin',
            ],
            // Anda bisa menambahkan peran lain di sini jika perlu
        ]);
    }
}