<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role_id'  => 1,
        ]);
    }
}
