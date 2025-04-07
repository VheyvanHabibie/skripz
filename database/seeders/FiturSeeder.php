<?php

namespace Database\Seeders;

use App\Models\Fitur;
use Illuminate\Database\Seeder;

class FiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fiturs = [
            ['name' => 'Pengajuan Proposal', 'key' => 'submission_proposal'],
            ['name' => 'Laporan Kemajuan', 'key' => 'progress_report'],
            ['name' => 'Notifikasi Seminar', 'key' => 'notification_seminar'],
            ['name' => 'Tracking Skripsi', 'key' => 'thesis_tracking'],
            ['name' => 'Upload Dokumen', 'key' => 'unlimited_upload'],
            ['name' => 'Kolaborasi dengan Dosen', 'key' => 'collaboration'],
            ['name' => 'Judul Skripsi', 'key' => 'thesis_topics'],
            ['name' => 'Notifikasi Otomatis', 'key' => 'task_notifications'],
            ['name' => 'Penyimpanan Cloud', 'key' => 'storage_limit']
        ];

        foreach ($fiturs as $fitur) {
            Fitur::updateOrCreate(['key' => $fitur['key']], $fitur);
        }
    }
}
