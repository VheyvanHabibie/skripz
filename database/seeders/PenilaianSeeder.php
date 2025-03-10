<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaians = [
            ['judul' => 'Kesesuaian format penulisan dan bahasa', 'grup' => 'Tulisan'],
            ['judul' => 'Pembahasan teoritis / studi kepustakaan', 'grup' => 'Tulisan'],
            ['judul' => 'Kejelasan rancangan masalah', 'grup' => 'Tulisan'],
            ['judul' => 'Pengujian / Analisa', 'grup' => 'Tulisan'],
            ['judul' => 'Kesimpulan', 'grup' => 'Tulisan'],

            ['judul' => 'Sistematika Pengkajian dan Pembahasan hasil penelitian', 'grup' => 'Presentasi'],
            ['judul' => 'Cara Penyampaian (kualitas komunikasi)', 'grup' => 'Presentasi'],

            ['judul' => 'Penguasaan Teori', 'grup' => 'Penguasaan'],
            ['judul' => 'Penguasaan Praktis', 'grup' => 'Penguasaan'],
            ['judul' => 'Penguasaan Wawasan', 'grup' => 'Penguasaan'],
            ['judul' => 'Penguasaan Analisis', 'grup' => 'Penguasaan'],

            ['judul' => 'Produk berfungsi/tidak', 'grup' => 'Kualitas'],
            ['judul' => 'Kerapihan Produk', 'grup' => 'Kualitas'],
            ['judul' => 'Nilai Tambahan', 'grup' => 'Kualitas'],
        ];

        DB::table('penilaians')->insert($penilaians);
    }
}
