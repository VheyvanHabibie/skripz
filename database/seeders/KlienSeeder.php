<?php

namespace Database\Seeders;

use App\Models\Klien;
use Illuminate\Database\Seeder;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klien::create([
            'logo'     => 'assets/images/logo-makerindo.png',
            'nama_klien' => 'PT. Makerindo Prima Solusi',
        ]);
        
        Klien::create([
            'logo'     => 'assets/images/logo-ipb.png',
            'nama_klien' => 'Institut Pertanian Bogor',
        ]);

        Klien::create([
            'logo'     => 'assets/images/logo-piksiGanesha.png',
            'nama_klien' => 'Politeknik Piksi Ganesha',
        ]);
    }
}
