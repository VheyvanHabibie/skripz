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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('keilmuan_id')->nullable();
            $table->string('nip_dosen');
            $table->string('slug');
            $table->text('nama_dosen');
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->text('alamat')->nullable();
            $table->text('email');
            $table->string('no_telepon');
            $table->json('bidang_keahlian')->nullable();
            $table->text('foto');
            $table->string('status_dosen')->nullable();
            $table->string('kelompok_keilmuan')->nullable();
            $table->string('akun_link')->nullable();
            $table->text('paraf')->nullable();
            $table->timestamps();
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreign('keilmuan_id')->references('id')->on('keilmuans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
