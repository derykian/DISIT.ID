<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun untuk Level Pembeli (Customer)
        User::create([
            'name' => 'Pembeli Disit',
            'email' => 'pembeli@disit.id',
            'password' => Hash::make('rahasiaPembeli123'),
            'role' => 'customer',
        ]);

        // 2. Akun untuk Level Admin Distro
        User::create([
            'name' => 'Admin',
            'email' => 'admin@disit.id',
            'password' => Hash::make('rahasiaAdmin123'),
            'role' => 'admin',
        ]);
    }
}
