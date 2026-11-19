<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Workshop;
use App\Models\User;

class BengkelSeeder extends Seeder
{
    public function run(): void
    {
        $bengkel1 = Workshop::updateOrCreate(
            ['code' => 'BKL-01'],
            [
                'name'    => 'MOONEYES SERVICES - BEKASI',
                'address' => 'Jl. Raya Mustika Jaya, Bekasi',
                'phone'   => '0812-0000-0001',
            ]
        );

        $bengkel2 = Workshop::updateOrCreate(
            ['code' => 'BKL-02'],
            [
                'name'    => 'MOONEYES GARAGE - JAKARTA',
                'address' => 'Jl. Fatmawati Raya, Jakarta Selatan',
                'phone'   => '0812-0000-0002',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.bekasi@mooneyes.local'],
            [
                'name'        => 'Admin Bengkel Bekasi',
                'password'    => Hash::make('password123'),
                'workshop_id' => $bengkel1->id,
                'role'        => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.jakarta@mooneyes.local'],
            [
                'name'        => 'Admin Bengkel Jakarta',
                'password'    => Hash::make('password123'),
                'workshop_id' => $bengkel2->id,
                'role'        => 'admin',
            ]
        );
    }
}