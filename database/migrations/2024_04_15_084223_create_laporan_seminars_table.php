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
        Schema::create('laporan_seminars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_penguji_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->date('tanggal_seminar');
            $table->text('hasil_seminar');
            $table->text('saran_penguji');
            $table->text('catatan_mahasiswa');
            $table->text('file_laporan');
            $table->foreign('dosen_penguji_id')->references('id')->on('dosen_pengujis')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_seminars');
    }
};
