<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_sidangs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sidang');
            $table->time('waktu_sidang');
            $table->string('dosen_penguji1');
            $table->string('dosen_penguji2');
            $table->string('judul_skripsi');
            $table->text('nilai_skripsi');
            $table->text('saran_penguji');
            $table->text('file_laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_sidangs');
    }
};
