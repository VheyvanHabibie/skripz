<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('data_personals')->onDelete('cascade'); // Relasi ke personal
            $table->string('nama_sekolah');
            $table->text('lokasi_education');
            $table->string('bulan_mulai_education');
            $table->string('tahun_mulai_education');
            $table->string('bulan_selesai_education');
            $table->string('tahun_selesai_education');
            $table->text('deskripsi_education')->nullable();
            $table->string('jenjang_sekolah');
            $table->double('ipk');
            $table->double('ipk_max');
            $table->text('pencapaian')->nullable();
            $table->text('link_sertifikat')->nullable();
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
        Schema::dropIfExists('data_education');
    }
}
