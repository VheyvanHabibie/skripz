<?php

namespace Database\Seeders;

use App\Models\ListLayanan;
use Illuminate\Database\Seeder;

class ListLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListLayanan::create([
            'icon'     => '<i class="bi bi-graph-up-arrow" style="font-size: 10rem"></i>',
            'content'   => 'Pemantauan Progress Mahasiswa',
        ]);

        ListLayanan::create([
            'icon'     => '<i class="bi bi-calendar-check" style="font-size: 10rem"></i>',
            'content'   => 'Pengelolaan Jadwal Seminar dan Sidang',
        ]);

        ListLayanan::create([
            'icon'     => '<i class="bi bi-file-earmark-text" style="font-size: 10rem"></i>',
            'content'   => 'Pengelolaan Dokumen Skripsi Mahasiswa'
        ]);
    }
}
