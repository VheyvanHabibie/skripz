<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PenguasaanMateri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenguasaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenguasaanMateri::create([
            'penguasaan' => 'Penguasaan Teori',
        ]);
        PenguasaanMateri::create([
            'penguasaan' => 'Penguasaan Praktis',
        ]);
        PenguasaanMateri::create([
            'penguasaan' => 'Penguasaan Wawasan',
        ]);
        PenguasaanMateri::create([
            'penguasaan' => 'Penguasaan Analisis',
        ]);
    }
}
