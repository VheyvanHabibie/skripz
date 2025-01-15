<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lokasi file JSON
        $filePaths = [
            'provinsi' => public_path('json/provinsi.json'),
            'kabupaten' => public_path('json/kabupaten.json'),
            'kecamatan' => public_path('json/kecamatan.json'),
            'kelurahan' => public_path('json/kelurahan.json'),
        ];

        // Validasi keberadaan file
        foreach ($filePaths as $key => $filePath) {
            if (!File::exists($filePath)) {
                Log::error("File JSON {$key} tidak ditemukan di path {$filePath}");
                echo "Error: File JSON {$key} tidak ditemukan.\n";
                return; // Hentikan jika file tidak ada
            }
        }

        // Mulai proses seeder
        try {
            DB::beginTransaction(); // Mulai transaksi database

            // Seeder Provinsi
            $this->seedData('provinsis', $filePaths['provinsi'], 'Provinsi');

            // Seeder Kabupaten
            $this->seedData('kabupatens', $filePaths['kabupaten'], 'Kabupaten');

            // Komentarkan sementara untuk kecamatan dan kelurahan
            // Seeder Kecamatan dengan chunk (1000 rows per batch)
            // $this->seedDataWithChunks('kecamatans', $filePaths['kecamatan'], 'Kecamatan', 1000);

            // Seeder Kelurahan dengan chunk (1000 rows per batch)
            // $this->seedDataWithChunks('kelurahans', $filePaths['kelurahan'], 'Kelurahan', 1000);

            DB::commit(); // Commit transaksi
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada error
            Log::error("Seeder gagal dijalankan: " . $e->getMessage());
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    /**
     * Seeder data tanpa chunking.
     */
    private function seedData(string $tableName, string $filePath, string $logPrefix): void
    {
        echo "Memulai proses seeder data {$logPrefix}...\n";

        $data = json_decode(File::get($filePath), true);

        if ($data && is_array($data)) {
            DB::table($tableName)->insert($data);
            echo "Done seeder data {$logPrefix}.\n";
        } else {
            echo "Error: Data {$logPrefix} tidak valid atau kosong.\n";
        }
    }

    /**
     * Seeder data dengan chunking.
     */
    private function seedDataWithChunks(string $tableName, string $filePath, string $logPrefix, int $chunkSize): void
    {
        echo "Memulai proses seeder data {$logPrefix} dengan chunking...\n";

        $data = json_decode(File::get($filePath), true);

        if ($data && is_array($data)) {
            $chunks = array_chunk($data, $chunkSize);
            foreach ($chunks as $index => $chunk) {
                DB::table($tableName)->insert($chunk);
                echo "Done seeder data {$logPrefix} chunk ke-" . ($index + 1) . "\n";
            }
        } else {
            echo "Error: Data {$logPrefix} tidak valid atau kosong.\n";
        }
    }
}
