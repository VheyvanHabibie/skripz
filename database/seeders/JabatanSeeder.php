<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(['nama_jabatan' => 'Rektor']);
        Jabatan::create(['nama_jabatan' => 'Dekan']);
        Jabatan::create(['nama_jabatan' => 'Wakil Rektor']);
        Jabatan::create(['nama_jabatan' => 'Ketua Program Studi']);
        Jabatan::create(['nama_jabatan' => 'Dosen']);
        Jabatan::create(['nama_jabatan' => 'Staf Administrasi']);
        Jabatan::create(['nama_jabatan' => 'Asisten Peneliti']);
    }
}
