<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            "Teknik Informatika",
            "Sistem Informasi",
            "Teknik Elektro",
            "Teknik Mesin",
            "Teknik Sipil",
            "Manajemen",
            "Akuntansi",
            "Ilmu Komunikasi",
            "Psikologi",
            "Hukum"
        ];

        foreach ($jurusan as $jur) {
            Jurusan::create([
                'nama_jurusan' => $jur
            ]);
        }
    }
}
