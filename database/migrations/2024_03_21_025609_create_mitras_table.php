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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->text('alamat_mitra')->nullable();
            $table->string('email_mitra')->nullable();
            $table->string('no_telepon_mitra')->nullable();
            $table->string('website')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('jabatan_pj')->nullable();
            $table->string('email_pj')->nullable();
            $table->string('no_telepon_pj')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('logo')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
