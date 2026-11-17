<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Langsung buat akun admin di sini agar otomatis masuk saat di-seed
        User::updateOrCreate(
            ['email' => 'admin@bengkel.com'],
            [
                'name' => 'Admin Bengkel',
                'password' => Hash::make('12345'),
            ]
        );
    }
}