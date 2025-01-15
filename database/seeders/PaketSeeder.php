<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        Paket::create([
            'kategori' => 'Akademisi',
            'jenis' => 'Basic',
            'title' => ' Basic',
            'description' => 'Paket Basic',
            'fitur' => '<ul>
            <li>Pendaftaran akun.</li>
            <li>Pengajuan proposal dan draft skripsi (maksimal 2 dokumen).</li>
            <li>Laporan kemajuan penelitian (maksimal 3 laporan).</li>
            <li>Notifikasi real-time untuk jadwal seminar dan sidang.</li>
            <li>Sistem monitoring skripsi dasar (tracking status proposal).</li>
            <li>Upload dokumen tanpa batas (termasuk revisi dan hasil penelitian).</li>
            <li>Akses ke template dan format laporan standar universitas.</li>
            <li>Fitur kolaborasi dengan dosen pembimbing: komentar dan revisi langsung.</li>
            <li>Daftar 5-10 judul topik skripsi sebagai inspirasi untuk pengajuan proposal.</li>
            <li>Notifikasi tugas penting dan jadwal otomatis.</li>
            <li>Penyimpanan hingga 500 MB.<br></li>
            <li>Tidak mencakup fitur analisis atau sinkronisasi dengan sistem universitas.<br></li>
            </ul>
            ',
            'harga' => '75000',
            'duration' => '6 Bulan',
        ]);

        Paket::create([
            'kategori' => 'Akademisi',
            'jenis' => 'Pro',
            'title' => ' Pro',
            'description' => 'Paket Pro',
            'fitur' => '<ul>
            <li>Semua fitur Paket Basic.</li>
            <li>Analisis progres skripsi berbasis data (grafik, statistik kemajuan).</li>
            <li>Akses ke 15+ topik skripsi baru yang relevan setiap semester.</li>
            <li>Sinkronisasi data dengan sistem akademik universitas.</li>
            <li>Layanan backup otomatis untuk semua dokumen.</li>
            <li>Export data laporan dalam format PDF atau Word.</li>
            <li>Fitur pencarian referensi otomatis melalui integrasi ke database penelitian.</li>
            <li>Penyimpanan hingga 2 GB.<br></li>
            <li>Akses prioritas untuk revisi dengan dosen.<br></li>
            </ul>
            ',
            'harga' => '100000',
            'duration' => '6 Bulan',
        ]);

        Paket::create([
            'kategori' => 'Industri',
            'jenis' => 'Basic',
            'title' => ' Basic',
            'description' => 'Paket Basic',
            'fitur' => '<ul>
            <li>Akses pendaftaran sebagai mitra perusahaan.</li>
            <li>Akses terbatas ke topik penelitian (maksimal 3 topik).</li>
            <li>Dashboard sederhana untuk pemantauan 1 proyek kolaborasi mahasiswa.</li>
            <li>Laporan kemajuan mahasiswa dalam format standar (maksimal 3 laporan).</li>
            <li>Notifikasi jadwal presentasi atau laporan mahasiswa terkait proyek perusahaan.</li>
            <li>Akses tanpa batas ke topik penelitian (5-10 topik per semester).</li>
            <li>Dashboard kolaborasi yang menampilkan data proyek dan progress mahasiswa.</li>
            <li>Laporan kemajuan yang lebih rinci (grafik, statistik).</li>
            <li>Kemampuan memberikan komentar dan revisi langsung pada laporan mahasiswa.</li>
            <li>Penyimpanan data proyek tanpa batas.</li>
            <li>Kolaborasi dengan maksimal 5 mahasiswa dalam 1 semester.</li>
            <li>Tidak mencakup fitur integrasi khusus perusahaan.</li>
            </ul>
            ',
            'harga' => '500000',
            'duration' => '6 Bulan',
        ]);
        Paket::create([
            'kategori' => 'Industri',
            'jenis' => 'Pro',
            'title' => ' Pro',
            'description' => 'Paket Pro',
            'fitur' => '<ul>
            <li>Semua fitur Paket Basic.</li>
            <li>Penyesuaian topik penelitian sesuai kebutuhan perusahaan.</li>
            <li>Integrasi data dan laporan dengan sistem internal perusahaan.</li>
            <li>Fitur analitik mendalam: performa mahasiswa, tren riset, dan evaluasi proyek.</li>
            <li>Layanan backup data otomatis dan export laporan dalam format custom.</li>
            <li>Layanan chat langsung dengan mahasiswa dan dosen pembimbing terkait proyek.</li>
            <li>Akses eksklusif ke 15+ topik penelitian baru setiap semester.</li>
            <li>Kolaborasi tanpa batas dengan mahasiswa di berbagai kampus mitra</li>
            <li>Dukungan teknis prioritas untuk implementasi dan pengelolaan sistem.</li>
            </ul>
            ',
            'harga' => '750000',
            'duration' => '6 Bulan',
        ]);
    }
}
