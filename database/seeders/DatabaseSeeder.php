<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Buat Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@bengkel.com'],
            [
                'name' => 'Admin Bengkel',
                'password' => Hash::make('12345'),
            ]
        );

        // 2. Panggil Seeder Barang Bengkel (Wajib ada agar datanya masuk)
        $this->call([
            BengkelSeeder::class,
        ]);
    }
}