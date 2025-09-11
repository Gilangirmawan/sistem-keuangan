<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PERBAIKAN: Menggunakan nama tabel 'role' (singular)
        DB::table('role')->truncate();

        // PERBAIKAN: Menggunakan nama tabel 'role' dan kolom 'role'
        DB::table('role')->insert([
            [
                'role' => 'admin',
            ],
            // Anda bisa menambahkan peran lain di sini jika perlu
        ]);
    }
}

