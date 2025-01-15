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
        Schema::create('asistensis', function (Blueprint $table) {
            $table->id();
            $table->string('pertemuan')->nullable();
            $table->text('materi');
            $table->string('bab');
            $table->boolean('paraf')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistensis');
    }
};
