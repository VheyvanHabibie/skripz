<?php

namespace Database\Seeders;

use App\Models\KartuBimbingan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KartuBimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!KartuBimbingan::first()) {
            KartuBimbingan::create([
                'nim'                     => 'NPM32110102',
                'nama'                    => 'Alexander Arnold',
                'judul_skripsi'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
                'perubahan_judul_skripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            ]);
        }
    }
}
