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
        Schema::create('laporan_proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_pembimbing_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('judul_proposal');
            $table->text('bidang_kajian');
            $table->text('file_laporan');
            $table->date('tanggal_pengajuan');
            $table->enum('status_laporan', ['Disetujui', 'Ditolak', 'Diajukan'])->default('Diajukan');
            $table->timestamps();
            $table->foreign('dosen_pembimbing_id')->references('id')->on('dosen_pembimbings')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_proposals');
    }
};
