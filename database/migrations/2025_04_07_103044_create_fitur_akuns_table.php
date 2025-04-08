<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiturAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitur_akuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id');
            $table->foreign('akun_id')->references('id')->on('akun_statuses')->onDelete('cascade');
            $table->unsignedBigInteger('fitur_id');
            $table->foreign('fitur_id')->references('id')->on('fiturs')->onDelete('cascade');
            $table->integer('limit')->nullable();
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
        Schema::dropIfExists('fitur_akuns');
    }
}
