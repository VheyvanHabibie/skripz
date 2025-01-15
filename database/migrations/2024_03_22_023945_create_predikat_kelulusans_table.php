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
        Schema::create('predikat_kelulusans', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa');
            $table->float('memuaskan')->default(0.0);
            $table->float('sangat_memuaskan')->default(0.0);
            $table->float('cumlaude')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predikat_kelulusans');
    }
};
