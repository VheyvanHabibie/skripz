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
        Schema::create('kelompok_keilmuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keilmuan_id');
            $table->string('koordinator');
            $table->string('fakultas');
            $table->text('deskripsi');
            $table->text('links');
            $table->timestamps();
            $table->foreign('keilmuan_id')->references('id')->on('keilmuans')->onDelete('cascade');            $table->string('bidang_kajian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_keilmuans');
    }
};
