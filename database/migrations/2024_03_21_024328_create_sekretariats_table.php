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
        Schema::create('sekretariats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekretariat');
            $table->string('nip');
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->string('email');
            $table->string('no_telepon');
            $table->text('foto')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekretariats');
    }
};
