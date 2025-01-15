<?php

namespace Database\Seeders;

use App\Models\Persyaratan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Persyaratan::create([
            'persyaratan' => 'Telah melaksanakan Seminar Skripsi (BAP Seminar)',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Formulir Pengajuan Sidang Skripsi dari Pembimbing',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Telah mengikuti dan lulus semua mata kuliah Prodi (Bebas nilai E, Min SKS = 145)',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'IPK minimal 2.00 (transkip nilai)',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Kartu Rencana Studi (KRS) atau Kartu Ujian semester terakhir',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Kartu Bimbingan (minimal 10 kali)',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Telah mengikuti seminar
            TA yang ada di Prodi (minimal : 10, dibuktikan dengan bukti kehadiran seminar)
            Seminar Prodi (minimal : 2 dibuktikan dengan sertifikat
            Seminar diluar Prodi (minimal : 1 dibuktikan dengan sertifikat)
            ',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Sertifikat toefle (sesuai SK Rektor : sertifikat dari leb Bahasa Unikom dan minimal nilai 400, 1 tahun terakhir)',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Fotocopy bukti print out telah melunasi seluruh biaya kuliah dari dashboard mahasiswa',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Fotocopy bukti membayar biaya siding dan wisuda dari Direktorat Keuangan',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => ' Fotocopy bebas Pinjam Buku dari Perpustakaan',
            'status'      => false,
        ]);
        Persyaratan::create([
            'persyaratan' => 'Draft TA : 3 buah ( dimasukan ke dalam map plastik biru)',
            'status'      => false,
        ]);
    }
}
