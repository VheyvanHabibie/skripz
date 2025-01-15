<?php

namespace Database\Seeders;

use App\Models\Tulisan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TulisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tulisan::create([
            'tulisan' => 'Kesesuaian format penulisan dan bahasa',
        ]);
        Tulisan::create([
            'tulisan' => 'Pembahasan teoritis / studi kepustakaan',
        ]);
        Tulisan::create([
            'tulisan' => 'Kejelasan rancangan masalah',
        ]);
        Tulisan::create([
            'tulisan' => 'Pengujian / Analisa',
        ]);
        Tulisan::create([
            'tulisan' => 'Kesimpulan',
        ]);
    }
}
