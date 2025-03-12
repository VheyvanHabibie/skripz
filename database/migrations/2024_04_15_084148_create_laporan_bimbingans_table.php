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
        Schema::create('laporan_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_pembimbing_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->date('tanggal_bimbingan');
            $table->string('topik_bahasan');
            $table->text('hasil_bimbingan');
            $table->text('saran_pembimbing');
            $table->text('catatan_mahasiswa');
            $table->text('file_laporan');
            $table->foreign('dosen_pembimbing_id')->references('id')->on('dosen_pembimbings')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_bimbingans');
    }
};
