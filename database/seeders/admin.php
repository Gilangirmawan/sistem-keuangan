<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // kalau email sudah ada
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'), // ganti dengan password aman
            ]
        );
    }
}
