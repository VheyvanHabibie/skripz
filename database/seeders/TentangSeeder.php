<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tentang::create([
            'title'         => 'Tentang SkripZ',
            'subtitle'      => 'SkripZ adalah platform berbasis web dan mobile yang mempermudah proses penelitian skripsi. ',
            'description'   => 'Dikembangkan oleh PT Makerindo Prima Solusi dengan tujuan:',
            'pointone'      => 'Meningkatkan efisiensi administrasi.',
            'pointtwo'      => 'Transparansi dan akuntabilitas.',
            'pointthree'    => 'Peningkatan kualitas penelitian.',
        ]);
    }
}
