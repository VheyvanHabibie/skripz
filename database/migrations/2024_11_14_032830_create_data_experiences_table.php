<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('data_personals')->onDelete('cascade'); // Relasi ke personal
            $table->string('nama_perusahaan');
            $table->string('jabatan');
            $table->text('lokasi_perusahaan');
            $table->text('deskripsi_perusahaan')->nullable();
            $table->string('bulan_mulai_experience');
            $table->string('tahun_mulai_experience');
            $table->string('bulan_selesai_experience');
            $table->string('tahun_selesai_experience');
            $table->text('portofolio_kerja');
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
        Schema::dropIfExists('data_experiences');
    }
}
