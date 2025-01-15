<?php

namespace Database\Seeders;

use App\Models\Perbaikan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perbaikan::create([
            'bab'            => 'I',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'II',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'III',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'IV',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'V',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'VI',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'VII',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'VIII',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'IX',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
        Perbaikan::create([
            'bab'            => 'X',
            'perbaikan'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit rem distinctio?',
            'selesai'        => false,
        ]);
    }
}
