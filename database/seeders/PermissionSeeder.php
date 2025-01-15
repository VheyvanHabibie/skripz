<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $permissions =
        // [
        //     'akses data-master', 'akses jadwal', 'akses progress-bimbingan', 'akses repository-skripsi', 'akses penilaian', 'akses laporan',
        //     'akses pengaturan-berkas', 'akses pengaturan-aplikasi', 'akses tentang-kami', 'akses management',
        //     'akses tambah-jadwal',
        //     'akses tambah-repository-skripsi', 'akses edit-repository-skripsi', 'akses hapus-repository-skripsi',
        //     'akses jabatan', 'akses tambah-jabatan', 'akses edit-jabatan', 'akses hapus-jabatan',
        //     'akses jurusan', 'akses tambah-jurusan', 'akses edit-jurusan', 'akses hapus-jurusan',
        //     'akses bidang-keahlian', 'akses tambah-bidang-keahlian', 'akses edit-bidang-keahlian', 'akses hapus-bidang-keahlian',
        //     'akses keilmuan', 'akses tambah-keilmuan', 'akses edit-keilmuan', 'akses hapus-keilmuan',
        //     'akses sumber-referensi', 'akses tambah-sumber-referensi', 'akses edit-sumber-referensi', 'akses hapus-sumber-referensi',
        //     'akses ruang', 'akses tambah-ruang', 'akses edit-ruang', 'akses hapus-ruang',
        //     'akses dosen', 'akses tambah-dosen', 'akses edit-dosen', 'akses hapus-dosen',
        //     'akses dospem', 'akses tambah-dospem', 'akses edit-dospem', 'akses hapus-dospem',
        //     'akses dospeng', 'akses tambah-dospeng', 'akses edit-dospeng', 'akses hapus-dospeng',
        //     'akses mahasiswa', 'akses tambah-mahasiswa', 'akses edit-mahasiswa', 'akses hapus-mahasiswa',
        //     'akses mahbim', 'akses tambah-mahbim', 'akses edit-mahbim', 'akses hapus-mahbim',
        //     'akses bimbingan', 'akses tambah-bimbingan', 'akses edit-bimbingan', 'akses hapus-bimbingan',
        //     'akses sekretariat', 'akses tambah-sekretariat', 'akses edit-sekretariat', 'akses hapus-sekretariat',
        //     'akses jadbim', 'akses tambah-jadbim', 'akses edit-jadbim', 'akses hapus-jadbim',
        //     'akses topik', 'akses tambah-topik', 'akses edit-topik', 'akses hapus-topik',
        //     'akses kelilmuan', 'akses tambah-kelilmuan', 'akses edit-kelilmuan', 'akses hapus-kelilmuan',
        //     'akses mitra', 'akses tambah-mitra', 'akses edit-mitra', 'akses hapus-mitra',
        //     'akses thakademik', 'akses tambah-thakademik', 'akses edit-thakademik', 'akses hapus-thakademik',
        //     'akses kaprodi', 'akses tambah-kaprodi', 'akses edit-kaprodi', 'akses hapus-kaprodi',
        //     'akses penilaian-sidang',
        //     'akses penilaian-seminar',
        //     'akses predlulus', 'akses tambah-predlulus', 'akses edit-predlulus', 'akses hapus-predlulus',
        //     'akses management-user', 'akses tambah-management-user', 'akses edit-management-user', 'akses hapus-management-user',
        //     'akses management-role', 'akses tambah-management-role', 'akses edit-management-role', 'akses hapus-management-role',
        //     'akses laporan-usulan-proposal', 'akses tambah-laporan-usulan-proposal', 'akses edit-laporan-usulan-proposal', 'akses hapus-laporan-usulan-proposal',
        //     'akses laporan-kemajuan-seminar', 'akses tambah-laporan-kemajuan-seminar', 'akses edit-laporan-kemajuan-seminar', 'akses hapus-laporan-kemajuan-seminar',
        //     'akses laporan-bimbingan', 'akses tambah-laporan-bimbingan', 'akses edit-laporan-bimbingan', 'akses hapus-laporan-bimbingan',
        //     'akses laporan-sidang', 'akses tambah-laporan-sidang', 'akses edit-laporan-sidang', 'akses hapus-laporan-sidang',
        //     'akses laporan-yudisium', 'akses tambah-laporan-yudisium', 'akses edit-laporan-yudisium', 'akses hapus-laporan-yudisium', 'akses data-konten-frontend'
        // ];

        $permissions = [
            // Sidebar
            ['name'=> 'akses data-master', 'group_name' => 'Menu'],
            ['name'=> 'akses data-utama', 'group_name' => 'Menu'],
            ['name'=> 'akses jadwal', 'group_name' => 'Menu'],
            ['name'=> 'akses progress-bimbingan', 'group_name' => 'Menu'],
            ['name'=> 'akses repository-skripsi', 'group_name' => 'Menu'],
            ['name'=> 'akses penilaian', 'group_name' => 'Menu'],
            ['name'=> 'akses laporan', 'group_name' => 'Menu'],
            ['name'=> 'akses pengaturan-berkas', 'group_name' => 'Menu'],
            ['name'=> 'akses pengaturan-aplikasi', 'group_name' => 'Menu'],
            ['name'=> 'akses tentang-kami', 'group_name' => 'Menu'],
            ['name'=> 'akses manajemen', 'group_name' => 'Menu'],
            ['name'=> 'akses kerja-sama', 'group_name' => 'Menu'],
            ['name'=> 'akses langganan', 'group_name' => 'Menu'],
            ['name'=> 'akses pelamar', 'group_name' => 'Menu'],
            ['name'=> 'akses lowongan', 'group_name' => 'Menu'],
            ['name'=> 'akses buat-cv', 'group_name' => 'Menu'],
            ['name'=> 'akses pengumuman', 'group_name' => 'Menu'],
            ['name'=> 'akses data-konten-frontend', 'group_name' => 'Menu'],

            // Provinsi
            ['name' => 'akses provinsi', 'group_name' => 'Provinsi'],
            ['name' => 'akses tambah-provinsi', 'group_name' => 'Provinsi'],
            ['name' => 'akses edit-provinsi', 'group_name' => 'Provinsi'],
            ['name' => 'akses hapus-provinsi', 'group_name' => 'Provinsi'],

            // Kabupaten
            ['name' => 'akses kabupaten', 'group_name' => 'Kabupaten'],
            ['name' => 'akses tambah-kabupaten', 'group_name' => 'Kabupaten'],
            ['name' => 'akses edit-kabupaten', 'group_name' => 'Kabupaten'],
            ['name' => 'akses hapus-kabupaten', 'group_name' => 'Kabupaten'],

            // Perguruan Tinggi
            ['name' => 'akses perguruan-tinggi', 'group_name' => 'Perguruan Tinggi'],
            ['name' => 'akses tambah-perguruan-tinggi', 'group_name' => 'Perguruan Tinggi'],
            ['name' => 'akses edit-perguruan-tinggi', 'group_name' => 'Perguruan Tinggi'],
            ['name' => 'akses hapus-perguruan-tinggi', 'group_name' => 'Perguruan Tinggi'],

            // Jabatan
            ['name' => 'akses jabatan', 'group_name' => 'Jabatan'],
            ['name' => 'akses tambah-jabatan', 'group_name' => 'Jabatan'],
            ['name' => 'akses edit-jabatan', 'group_name' => 'Jabatan'],
            ['name' => 'akses hapus-jabatan', 'group_name' => 'Jabatan'],

            // Jurusan
            ['name' => 'akses jurusan', 'group_name' => 'Jurusan'],
            ['name' => 'akses tambah-jurusan', 'group_name' => 'Jurusan'],
            ['name' => 'akses edit-jurusan', 'group_name' => 'Jurusan'],
            ['name' => 'akses hapus-jurusan', 'group_name' => 'Jurusan'],

            // Bidang Keahlian
            ['name' => 'akses bidang-keahlian', 'group_name' => 'Bidang Keahlian'],
            ['name' => 'akses tambah-bidang-keahlian', 'group_name' => 'Bidang Keahlian'],
            ['name' => 'akses edit-bidang-keahlian', 'group_name' => 'Bidang Keahlian'],
            ['name' => 'akses hapus-bidang-keahlian', 'group_name' => 'Bidang Keahlian'],

            // Keilmuan
            ['name' => 'akses keilmuan', 'group_name' => 'Keilmuan'],
            ['name' => 'akses tambah-keilmuan', 'group_name' => 'Keilmuan'],
            ['name' => 'akses edit-keilmuan', 'group_name' => 'Keilmuan'],
            ['name' => 'akses hapus-keilmuan', 'group_name' => 'Keilmuan'],

            // Sumber referensi
            ['name' => 'akses sumber-referensi', 'group_name' => 'Sumber Referensi'],
            ['name' => 'akses tambah-sumber-referensi', 'group_name' => 'Sumber Referensi'],
            ['name' => 'akses edit-sumber-referensi', 'group_name' => 'Sumber Referensi'],
            ['name' => 'akses hapus-sumber-referensi', 'group_name' => 'Sumber Referensi'],

            // Ruang
            ['name' => 'akses ruang', 'group_name' => 'Ruang'],
            ['name' => 'akses tambah-ruang', 'group_name' => 'Ruang'],
            ['name' => 'akses edit-ruang', 'group_name' => 'Ruang'],
            ['name' => 'akses hapus-ruang', 'group_name' => 'Ruang'],

            // Dosen
            ['name' => 'akses dosen', 'group_name' => 'Dosen'],
            ['name' => 'akses tambah-dosen', 'group_name' => 'Dosen'],
            ['name' => 'akses edit-dosen', 'group_name' => 'Dosen'],
            ['name' => 'akses hapus-dosen', 'group_name' => 'Dosen'],
            ['name' => 'akses detail-dosen', 'group_name' => 'Dosen'],

            // Dosen Pembimbing
            ['name' => 'akses dospem', 'group_name' => 'Dosen Pembimbing'],
            ['name' => 'akses tambah-dospem', 'group_name' => 'Dosen Pembimbing'],
            ['name' => 'akses edit-dospem', 'group_name' => 'Dosen Pembimbing'],
            ['name' => 'akses hapus-dospem', 'group_name' => 'Dosen Pembimbing'],

            // Dosen Penguji
            ['name' => 'akses dospeng', 'group_name' => 'Dosen Penguji'],
            ['name' => 'akses tambah-dospeng', 'group_name' => 'Dosen Penguji'],
            ['name' => 'akses edit-dospeng', 'group_name' => 'Dosen Penguji'],
            ['name' => 'akses hapus-dospeng', 'group_name' => 'Dosen Penguji'],

            // Mahasiswa
            ['name' => 'akses mahasiswa', 'group_name' => 'Mahasiswa'],
            ['name' => 'akses tambah-mahasiswa', 'group_name' => 'Mahasiswa'],
            ['name' => 'akses edit-mahasiswa', 'group_name' => 'Mahasiswa'],
            ['name' => 'akses hapus-mahasiswa', 'group_name' => 'Mahasiswa'],
            ['name' => 'akses detail-mahasiswa', 'group_name' => 'Mahasiswa'],

            // Mahasiswa Bimbingan
            ['name' => 'akses mahbim', 'group_name' => 'Mahasiswa Bimbingan'],
            ['name' => 'akses tambah-mahbim', 'group_name' => 'Mahasiswa Bimbingan'],
            ['name' => 'akses edit-mahbim', 'group_name' => 'Mahasiswa Bimbingan'],
            ['name' => 'akses hapus-mahbim', 'group_name' => 'Mahasiswa Bimbingan'],

            // Bimbingan
            ['name' => 'akses bimbingan', 'group_name' => 'Bimbingan'],
            ['name' => 'akses tambah-bimbingan', 'group_name' => 'Bimbingan'],
            ['name' => 'akses edit-bimbingan', 'group_name' => 'Bimbingan'],
            ['name' => 'akses hapus-bimbingan', 'group_name' => 'Bimbingan'],

            // Sekretariat
            ['name' => 'akses sekretariat', 'group_name' => 'Sekretariat'],
            ['name' => 'akses tambah-sekretariat', 'group_name' => 'Sekretariat'],
            ['name' => 'akses edit-sekretariat', 'group_name' => 'Sekretariat'],
            ['name' => 'akses hapus-sekretariat', 'group_name' => 'Sekretariat'],

            // Jadwal Bimbingan
            ['name' => 'akses jadbim', 'group_name' => 'Jadwal Bimbingan'],
            ['name' => 'akses tambah-jadbim', 'group_name' => 'Jadwal Bimbingan'],
            ['name' => 'akses edit-jadbim', 'group_name' => 'Jadwal Bimbingan'],
            ['name' => 'akses hapus-jadbim', 'group_name' => 'Jadwal Bimbingan'],

            // Topik
            ['name' => 'akses topik', 'group_name' => 'Topik'],
            ['name' => 'akses tambah-topik', 'group_name' => 'Topik'],
            ['name' => 'akses edit-topik', 'group_name' => 'Topik'],
            ['name' => 'akses hapus-topik', 'group_name' => 'Topik'],

            // Kelompok Keilmuan
            ['name' => 'akses kelilmuan', 'group_name' => 'Kelompok Keilmuan'],
            ['name' => 'akses tambah-kelilmuan', 'group_name' => 'Kelompok Keilmuan'],
            ['name' => 'akses edit-kelilmuan', 'group_name' => 'Kelompok Keilmuan'],
            ['name' => 'akses hapus-kelilmuan', 'group_name' => 'Kelompok Keilmuan'],

            // Mitra
            ['name' => 'akses mitra', 'group_name' => 'Mitra'],
            ['name' => 'akses tambah-mitra', 'group_name' => 'Mitra'],
            ['name' => 'akses edit-mitra', 'group_name' => 'Mitra'],
            ['name' => 'akses hapus-mitra', 'group_name' => 'Mitra'],

            // Tahun Akademik
            ['name' => 'akses thakademik', 'group_name' => 'Tahun Akademik'],
            ['name' => 'akses tambah-thakademik', 'group_name' => 'Tahun Akademik'],
            ['name' => 'akses edit-thakademik', 'group_name' => 'Tahun Akademik'],
            ['name' => 'akses hapus-thakademik', 'group_name' => 'Tahun Akademik'],

            // Kaprodi
            ['name' => 'akses kaprodi', 'group_name' => 'Kaprodi'],
            ['name' => 'akses tambah-kaprodi', 'group_name' => 'Kaprodi'],
            ['name' => 'akses edit-kaprodi', 'group_name' => 'Kaprodi'],
            ['name' => 'akses hapus-kaprodi', 'group_name' => 'Kaprodi'],

            // Predikat Kelulusan
            ['name' => 'akses predlulus', 'group_name' => 'Predikat Kelulusan'],
            ['name' => 'akses tambah-predlulus', 'group_name' => 'Predikat Kelulusan'],
            ['name' => 'akses edit-predlulus', 'group_name' => 'Predikat Kelulusan'],
            ['name' => 'akses hapus-predlulus', 'group_name' => 'Predikat Kelulusan'],

            // Laporan
            ['name' => 'akses laporan-usulan-proposal', 'group_name' => 'Laporan Usulan Proposal'],
            ['name' => 'akses tambah-laporan-usulan-proposal', 'group_name' => 'Laporan Usulan Proposal'],
            ['name' => 'akses edit-laporan-usulan-proposal', 'group_name' => 'Laporan Usulan Proposal'],
            ['name' => 'akses hapus-laporan-usulan-proposal', 'group_name' => 'Laporan Usulan Proposal'],

            // Usulan Proposal
            ['name' => 'akses laporan-kemajuan-seminar', 'group_name' => 'Laporan Kemajuan Seminar'],
            ['name' => 'akses tambah-laporan-kemajuan-seminar', 'group_name' => 'Laporan Kemajuan Seminar'],
            ['name' => 'akses edit-laporan-kemajuan-seminar', 'group_name' => 'Laporan Kemajuan Seminar'],
            ['name' => 'akses hapus-laporan-kemajuan-seminar', 'group_name' => 'Laporan Kemajuan Seminar'],

            // Bimbingan
            ['name' => 'akses laporan-bimbingan', 'group_name' => 'Laporan Bimbingan'],
            ['name' => 'akses tambah-laporan-bimbingan', 'group_name' => 'Laporan Bimbingan'],
            ['name' => 'akses edit-laporan-bimbingan', 'group_name' => 'Laporan Bimbingan'],
            ['name' => 'akses hapus-laporan-bimbingan', 'group_name' => 'Laporan Bimbingan'],

            // Sidang
            ['name' => 'akses laporan-sidang', 'group_name' => 'Laporan Sidang'],
            ['name' => 'akses tambah-laporan-sidang', 'group_name' => 'Laporan Sidang'],
            ['name' => 'akses edit-laporan-sidang', 'group_name' => 'Laporan Sidang'],
            ['name' => 'akses hapus-laporan-sidang', 'group_name' => 'Laporan Sidang'],

            // Yudisium
            ['name' => 'akses laporan-yudisium', 'group_name' => 'Laporan Yudisium'],
            ['name' => 'akses tambah-laporan-yudisium', 'group_name' => 'Laporan Yudisium'],
            ['name' => 'akses edit-laporan-yudisium', 'group_name' => 'Laporan Yudisium'],
            ['name' => 'akses hapus-laporan-yudisium', 'group_name' => 'Laporan Yudisium'],

            // Management
            // User
            ['name' => 'akses management-user', 'group_name' => 'Manajemen Pengguna'],
            ['name' => 'akses tambah-management-user', 'group_name' => 'Manajemen Pengguna'],
            ['name' => 'akses edit-management-user', 'group_name' => 'Manajemen Pengguna'],
            ['name' => 'akses hapus-management-user', 'group_name' => 'Manajemen Pengguna'],
            // Role
            ['name' => 'akses management-role', 'group_name' => 'Manajemen Role'],
            ['name' => 'akses tambah-management-role', 'group_name' => 'Manajemen Role'],
            ['name' => 'akses edit-management-role', 'group_name' => 'Manajemen Role'],
            ['name' => 'akses hapus-management-role', 'group_name' => 'Manajemen Role'],

            // Pelamar
            ['name' => 'akses hapus-pelamar', 'group_name' => 'Manajemen Pelamar'],
            ['name' => 'akses detail-pelamar', 'group_name' => 'Manajemen Pelamar'],

            // Lowongan
            ['name' => 'akses tambah-lowongan', 'group_name' => 'Manajemen Lowongan'],
            ['name' => 'akses edit-lowongan', 'group_name' => 'Manajemen Lowongan'],
            ['name' => 'akses hapus-lowongan', 'group_name' => 'Manajemen Lowongan'],
            ['name' => 'akses detail-lowongan', 'group_name' => 'Manajemen Lowongan'],


            // Pengaturan
            ['name' => 'akses pengaturan-berkas', 'group_name' => 'Pengaturan'],
            ['name' => 'akses pengaturan-aplikasi', 'group_name' => 'Pengaturan'],


            // Jadwal
            ['name' => 'akses tambah-jadwal', 'group_name' => 'Jadwal'],

            // Pengumuman
            ['name' => 'akses tambah-pengumuman', 'group_name' => 'Pengumuman'],

            // Repository Skripsi
            ['name' => 'akses tambah-repository-skripsi', 'group_name' => 'Repository Skripsi'],
            ['name' => 'akses edit-repository-skripsi', 'group_name' => 'Repository Skripsi'],
            ['name' => 'akses hapus-repository-skripsi', 'group_name' => 'Repository Skripsi'],

            // Penilaian
            ['name' => 'akses penilaian-sidang', 'group_name' => 'Penilaian'],
            ['name' => 'akses penilaian-seminar', 'group_name' => 'Penilaian'],

        ];
        foreach ($permissions as $permissionData) {
            Permission::updateOrCreate(
                ['name' => $permissionData['name']],
                ['group_name' => $permissionData['group_name']]
            );
        }
    }
}
