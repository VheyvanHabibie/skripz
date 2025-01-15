<?php

namespace Database\Seeders;

use App\Models\SumberReferensi;
use Illuminate\Database\Seeder;

class SumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SumberReferensi::create([
            'sumber_referensi' => 'Skripsi Kaka Tingkat',
        ]);
        SumberReferensi::create([
            'sumber_referensi' => 'Penelitian Dosen',
        ]);
        SumberReferensi::create([
            'sumber_referensi' => 'Kompetisi Nasional',
        ]);
        SumberReferensi::create([
            'sumber_referensi' => 'Industri',
        ]);
    }
}
