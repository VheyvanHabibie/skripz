<?php

namespace Database\Seeders;

use App\Models\Beranda;
use Illuminate\Database\Seeder;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beranda::create([
            'title'         => 'SkripZ',
            'subtitle'      => 'One Step Closer To Success',
            'description'   => 'adalah platform terintegrasi dengan fitur pemantauan real-time, komunikasi langsung, dan penyimpanan dokumen yang aman. Kelola skripsi dengan mudah dan transparan melalui SkripZ!',
        ]);
    }
}
