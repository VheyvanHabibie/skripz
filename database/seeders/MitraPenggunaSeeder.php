<?php

namespace Database\Seeders;

use App\Models\MitraPengguna;
use Illuminate\Database\Seeder;

class MitraPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MitraPengguna::create([
            'logo'     => 'assets/images/logo-makerindo.png',
            'nama_mitra' => 'PT. Makerindo Prima Solusi',
        ]);
        
        MitraPengguna::create([
            'logo'     => 'assets/images/logo-ipb.png',
            'nama_mitra' => 'Institut Pertanian Bogor',
        ]);

        MitraPengguna::create([
            'logo'     => 'assets/images/logo-piksiGanesha.png',
            'nama_mitra' => 'Politeknik Piksi Ganesha',
        ]);
    }
}
