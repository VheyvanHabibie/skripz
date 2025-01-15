<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Setting::first()) {
            Setting::create([
                'logo' => 'logo/a.png',
                'nama_perguruan_tinggi' => 'MakerDotIndo',
                'nama_aplikasi' => 'SkripZ',
                'deskripsi' => 'Deskripsi',
                'tahun' => 2024,
                'versi' => '1.0',
                'copyright' => 'PT. Makerindo Prima Solusi',
                'alamat' => 'Komplek Pesona Ciganitri Blok A No. 39',
                'no_telepon' => '0815-4686-5286',
                'email' => 'makerdotindo@gmail.com',
                'url_instagram' => 'https://www.instagram.com/makerdotindo/',
                'url_linkedin' => 'https://www.linkedin.com/company/makerindo-prima-solusi',
                'url_youtube' => 'https://www.youtube.com/@makerindoprimasolusi',
            ]);
        }
    }
}
