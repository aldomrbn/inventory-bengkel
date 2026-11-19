<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Sparepart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class MooneyesSparepartSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama terlebih dahulu agar tidak ikut terbawa
        Schema::disableForeignKeyConstraints();
        if (class_exists(TransactionDetail::class)) {
            TransactionDetail::query()->truncate();
        }
        if (class_exists(Transaction::class)) {
            Transaction::query()->truncate();
        }
        Sparepart::query()->truncate();
        Category::query()->truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [
            'Mesin & Komponen'   => Category::create(['name' => 'Mesin & Komponen']),
            'Oli & Cairan'       => Category::create(['name' => 'Oli & Cairan']),
            'Pengapian & Intake' => Category::create(['name' => 'Pengapian & Intake']),
            'Interior & Kontrol' => Category::create(['name' => 'Interior & Kontrol']),
            'Eksterior & Velg'   => Category::create(['name' => 'Eksterior & Velg']),
            'Aksesoris Garasi'   => Category::create(['name' => 'Aksesoris Garasi']),
        ];

        $items = [
            // --- MESIN & KOMPONEN (5 item) ---
            [
                'code'       => 'ME-CAP-01',
                'name'       => 'MOONEYES Billet Oil Filler Cap',
                'category'   => 'Mesin & Komponen',
                'buy_price'  => 285000,
                'sell_price' => 375000,
                'stock'      => 12,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-VAL-02',
                'name'       => 'MOONEYES Finned Aluminum Valve Cover Set',
                'category'   => 'Mesin & Komponen',
                'buy_price'  => 1450000,
                'sell_price' => 1850000,
                'stock'      => 3,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-DIP-03',
                'name'       => 'MOONEYES Eyeball Dipstick Handle',
                'category'   => 'Mesin & Komponen',
                'buy_price'  => 135000,
                'sell_price' => 185000,
                'stock'      => 8,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-RAD-04',
                'name'       => 'MOONEYES High-Pressure Radiator Cap',
                'category'   => 'Mesin & Komponen',
                'buy_price'  => 165000,
                'sell_price' => 225000,
                'stock'      => 5,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-BTH-05',
                'name'       => 'MOONEYES Billet Breather Filter Mini',
                'category'   => 'Mesin & Komponen',
                'buy_price'  => 150000,
                'sell_price' => 205000,
                'stock'      => 11,
                'min_stock'  => 5,
            ],

            // --- OLI & CAIRAN (5 item) ---
            [
                'code'       => 'ME-OIL-06',
                'name'       => 'MOONEYES Racing 20W-50 Engine Oil (1L)',
                'category'   => 'Oli & Cairan',
                'buy_price'  => 145000,
                'sell_price' => 195000,
                'stock'      => 20,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-OIL-07',
                'name'       => 'MOONEYES Classic 10W-40 Synthetic Oil',
                'category'   => 'Oli & Cairan',
                'buy_price'  => 160000,
                'sell_price' => 215000,
                'stock'      => 4,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-CLN-08',
                'name'       => 'MOONEYES Engine Degreaser & Cleaner',
                'category'   => 'Oli & Cairan',
                'buy_price'  => 95000,
                'sell_price' => 135000,
                'stock'      => 0,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-WAX-09',
                'name'       => 'MOONEYES Speed Shop Carnauba Wax',
                'category'   => 'Oli & Cairan',
                'buy_price'  => 180000,
                'sell_price' => 245000,
                'stock'      => 7,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-BRK-10',
                'name'       => 'MOONEYES DOT-4 Performance Brake Fluid',
                'category'   => 'Oli & Cairan',
                'buy_price'  => 110000,
                'sell_price' => 150000,
                'stock'      => 2,
                'min_stock'  => 5,
            ],

            // --- PENGAPIAN & INTAKE (5 item) ---
            [
                'code'       => 'ME-SPK-11',
                'name'       => 'MOONEYES Performance Iridium Spark Plug Set',
                'category'   => 'Pengapian & Intake',
                'buy_price'  => 240000,
                'sell_price' => 315000,
                'stock'      => 15,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-AIR-12',
                'name'       => 'MOONEYES Chrome Custom Air Cleaner Kit',
                'category'   => 'Pengapian & Intake',
                'buy_price'  => 410000,
                'sell_price' => 530000,
                'stock'      => 5,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-FIL-13',
                'name'       => 'MOONEYES High-Flow Spin-On Oil Filter',
                'category'   => 'Pengapian & Intake',
                'buy_price'  => 120000,
                'sell_price' => 165000,
                'stock'      => 9,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-IGN-14',
                'name'       => 'MOONEYES 8.5mm Racing Ignition Wire Set',
                'category'   => 'Pengapian & Intake',
                'buy_price'  => 390000,
                'sell_price' => 510000,
                'stock'      => 3,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-FLT-15',
                'name'       => 'MOONEYES Mesh Cone Air Filter Yellow',
                'category'   => 'Pengapian & Intake',
                'buy_price'  => 195000,
                'sell_price' => 260000,
                'stock'      => 10,
                'min_stock'  => 5,
            ],

            // --- INTERIOR & KONTROL (5 item) ---
            [
                'code'       => 'ME-SHF-16',
                'name'       => 'MOONEYES Heavy Shift Knob Yellow',
                'category'   => 'Interior & Kontrol',
                'buy_price'  => 220000,
                'sell_price' => 295000,
                'stock'      => 7,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-SHF-17',
                'name'       => 'MOONEYES Eyeball 8-Ball Shift Knob',
                'category'   => 'Interior & Kontrol',
                'buy_price'  => 235000,
                'sell_price' => 310000,
                'stock'      => 2,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-PED-18',
                'name'       => 'MOONEYES Eyeball Gas Pedal Pad',
                'category'   => 'Interior & Kontrol',
                'buy_price'  => 175000,
                'sell_price' => 240000,
                'stock'      => 0,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-STR-19',
                'name'       => 'MOONEYES Classic Metalflake Steering Wheel',
                'category'   => 'Interior & Kontrol',
                'buy_price'  => 1850000,
                'sell_price' => 2350000,
                'stock'      => 3,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-HND-20',
                'name'       => 'MOONEYES Handbrake Grip Cover Yellow',
                'category'   => 'Interior & Kontrol',
                'buy_price'  => 115000,
                'sell_price' => 160000,
                'stock'      => 13,
                'min_stock'  => 5,
            ],

            // --- EKSTERIOR & VELG (5 item) ---
            [
                'code'       => 'ME-HUB-21',
                'name'       => 'MOONEYES Moon Disc Hubcap Set (4pcs)',
                'category'   => 'Eksterior & Velg',
                'buy_price'  => 650000,
                'sell_price' => 820000,
                'stock'      => 6,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-FRM-22',
                'name'       => 'MOONEYES License Plate Frame Yellow',
                'category'   => 'Eksterior & Velg',
                'buy_price'  => 85000,
                'sell_price' => 125000,
                'stock'      => 14,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-ANT-23',
                'name'       => 'MOONEYES Antenna Ball Eyeball',
                'category'   => 'Eksterior & Velg',
                'buy_price'  => 65000,
                'sell_price' => 95000,
                'stock'      => 1,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-VLV-24',
                'name'       => 'MOONEYES Tire Valve Cap Eyeball Set',
                'category'   => 'Eksterior & Velg',
                'buy_price'  => 75000,
                'sell_price' => 110000,
                'stock'      => 16,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-MDP-25',
                'name'       => 'MOONEYES Custom Mud Flap Set',
                'category'   => 'Eksterior & Velg',
                'buy_price'  => 260000,
                'sell_price' => 345000,
                'stock'      => 4,
                'min_stock'  => 5,
            ],

            // --- AKSESORIS GARASI (5 item) ---
            [
                'code'       => 'ME-MAT-26',
                'name'       => 'MOONEYES Garage Pit Mat Checkerboard',
                'category'   => 'Aksesoris Garasi',
                'buy_price'  => 520000,
                'sell_price' => 680000,
                'stock'      => 8,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-STK-27',
                'name'       => 'MOONEYES Custom Culture Decal Pack',
                'category'   => 'Aksesoris Garasi',
                'buy_price'  => 55000,
                'sell_price' => 85000,
                'stock'      => 0,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-TRY-28',
                'name'       => 'MOONEYES Magnetic Parts Tray Yellow',
                'category'   => 'Aksesoris Garasi',
                'buy_price'  => 140000,
                'sell_price' => 190000,
                'stock'      => 9,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-TWR-29',
                'name'       => 'MOONEYES Shop Towel Microfiber Set',
                'category'   => 'Aksesoris Garasi',
                'buy_price'  => 80000,
                'sell_price' => 115000,
                'stock'      => 5,
                'min_stock'  => 5,
            ],
            [
                'code'       => 'ME-BNN-30',
                'name'       => 'MOONEYES Garage Wall Banner Vinyl',
                'category'   => 'Aksesoris Garasi',
                'buy_price'  => 310000,
                'sell_price' => 415000,
                'stock'      => 3,
                'min_stock'  => 5,
            ],
        ];

        foreach ($items as $item) {
            Sparepart::create([
                'code'        => $item['code'],
                'name'        => $item['name'],
                'category_id' => $categories[$item['category']]->id,
                'buy_price'   => $item['buy_price'],
                'sell_price'  => $item['sell_price'],
                'stock'       => $item['stock'],
                'min_stock'   => $item['min_stock'],
            ]);
        }
    }
}