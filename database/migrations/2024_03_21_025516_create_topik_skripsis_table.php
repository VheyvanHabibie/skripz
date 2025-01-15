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
        Schema::create('topik_skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sumber_id');
            $table->unsignedBigInteger('keilmuan_id');
            $table->string('judul_topik');
            $table->text('kata_kunci');
            $table->text('deskripsi');
            $table->enum('status_topik', ['Diajukan', 'Disetujui', 'Ditolak'])->default('Diajukan');
            $table->json('link');
            $table->foreign('sumber_id')->references('id')->on('sumber_referensis')->onDelete('cascade');
            $table->foreign('keilmuan_id')->references('id')->on('keilmuans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topik_skripsis');
    }
};
