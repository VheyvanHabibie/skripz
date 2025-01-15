<?php

namespace Database\Seeders;

use App\Models\KualitasProduk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KualitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KualitasProduk::create([
            'kualitas' => 'Produk berfungsi/tidak',
        ]);
        KualitasProduk::create([
            'kualitas' => 'Kerapihan Produk',
        ]);
        KualitasProduk::create([
            'kualitas' => 'Nilai Tambahan',
        ]);
    }
}
