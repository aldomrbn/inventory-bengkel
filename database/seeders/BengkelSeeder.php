<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Sparepart;

class BengkelSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori Suku Cadang
        $oli = Category::create(['name' => 'Oli & Pelumas']);
        $rem = Category::create(['name' => 'Sistem Pengereman']);
        $mesin = Category::create(['name' => 'Komponen Mesin']);
        $kelistrikan = Category::create(['name' => 'Kelistrikan & Aki']);
        $kakiKaki = Category::create(['name' => 'Kaki-kaki & Transmisi']);

        // 2. Masukkan Daftar Sparepart Bengkel
        $spareparts = [
            // Oli & Pelumas
            [
                'category_id' => $oli->id,
                'code' => 'OLI-001',
                'name' => 'Oli Mesin MPX 2 (0.8L)',
                'buy_price' => 45000,
                'sell_price' => 55000,
                'stock' => 25,
                'min_stock' => 5,
            ],
            [
                'category_id' => $oli->id,
                'code' => 'OLI-002',
                'name' => 'Oli Gardan Matic AHM',
                'buy_price' => 15000,
                'sell_price' => 20000,
                'stock' => 15,
                'min_stock' => 3,
            ],
            [
                'category_id' => $oli->id,
                'code' => 'OLI-003',
                'name' => 'Oli Mesin Yamalube Gold',
                'buy_price' => 48000,
                'sell_price' => 60000,
                'stock' => 20,
                'min_stock' => 5,
            ],

            // Sistem Pengereman
            [
                'category_id' => $rem->id,
                'code' => 'REM-001',
                'name' => 'Kampas Rem Depan (Pad) Beat/Vario',
                'buy_price' => 30000,
                'sell_price' => 45000,
                'stock' => 12,
                'min_stock' => 4,
            ],
            [
                'category_id' => $rem->id,
                'code' => 'REM-002',
                'name' => 'Kampas Rem Belakang (Tromol) Universal',
                'buy_price' => 25000,
                'sell_price' => 35000,
                'stock' => 8,
                'min_stock' => 3,
            ],
            [
                'category_id' => $rem->id,
                'code' => 'REM-003',
                'name' => 'Minyak Rem Dot 4 (Bottles)',
                'buy_price' => 12000,
                'sell_price' => 18000,
                'stock' => 10,
                'min_stock' => 2,
            ],

            // Komponen Mesin
            [
                'category_id' => $mesin->id,
                'code' => 'MSN-001',
                'name' => 'Busi NGK Standard (Grand/Beat/Vario)',
                'buy_price' => 15000,
                'sell_price' => 22000,
                'stock' => 30,
                'min_stock' => 10,
            ],
            [
                'category_id' => $mesin->id,
                'code' => 'MSN-002',
                'name' => 'Filter Udara Beat Fi / Scoopy',
                'buy_price' => 20000,
                'sell_price' => 35000,
                'stock' => 6,
                'min_stock' => 5, // Sengaja diatur mendekati min_stock untuk uji coba alert
            ],
            [
                'category_id' => $mesin->id,
                'code' => 'MSN-003',
                'name' => 'V-Belt + Roller Kit Vario 125',
                'buy_price' => 110000,
                'sell_price' => 140000,
                'stock' => 4,
                'min_stock' => 5, // Sengaja diatur di bawah min_stock agar muncul badge merah (Stok Menipis)
            ],

            // Kelistrikan & Aki
            [
                'category_id' => $kelistrikan->id,
                'code' => 'AKK-001',
                'name' => 'Aki Kering GTZ5S (Maintenance Free)',
                'buy_price' => 180000,
                'sell_price' => 225000,
                'stock' => 5,
                'min_stock' => 2,
            ],
            [
                'category_id' => $kelistrikan->id,
                'code' => 'LMP-001',
                'name' => 'Bohlam Lampu Depan H6 Standar',
                'buy_price' => 10000,
                'sell_price' => 18000,
                'stock' => 15,
                'min_stock' => 4,
            ],

            // Kaki-kaki & Transmisi
            [
                'category_id' => $kakiKaki->id,
                'code' => 'KKI-001',
                'name' => 'Ban Luar Tubeless 90/90-14',
                'buy_price' => 160000,
                'sell_price' => 195000,
                'stock' => 7,
                'min_stock' => 3,
            ],
            [
                'category_id' => $kakiKaki->id,
                'code' => 'KKI-002',
                'name' => 'Ban Luar Tubeless 80/90-14',
                'buy_price' => 145000,
                'sell_price' => 175000,
                'stock' => 3,
                'min_stock' => 4, // Simulasi stok menipis
            ],
        ];

        foreach ($spareparts as $item) {
            Sparepart::create($item);
        }
    }
}