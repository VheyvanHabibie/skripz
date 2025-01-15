<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('data_personals')->onDelete('cascade'); // Relasi ke personal
            $table->string('nama_organisasi');
            $table->string('posisi');
            $table->text('deskripsi_organisasi')->nullable();
            $table->text('lokasi_organisasi')->nullable();
            $table->string('bulan_mulai_organisasi')->nullable();;
            $table->string('tahun_mulai_organisasi')->nullable();;
            $table->string('bulan_selesai_organisasi')->nullable();;
            $table->string('tahun_selesai_organisasi')->nullable();;
            $table->enum('status', ['aktif', 'tidak'])->default('tidak');
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_organizations');
    }
}
