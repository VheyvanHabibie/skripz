<?php

namespace Database\Seeders;

use App\Models\Presentasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PresentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Presentasi::create([
            'presentasi' => 'Sistematika Pengkajian dan Pembahasan hasil penelitian',
        ]);
        Presentasi::create([
            'presentasi' => 'Cara Penyampaian (kualitas komunikasi)',
        ]);
    }
}
