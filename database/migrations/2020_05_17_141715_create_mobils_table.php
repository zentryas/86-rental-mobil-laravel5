<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('merek_id');
            $table->string('nama_mobil');
            $table->string('nopol');
            $table->string('tahun');
            $table->string('seat');
            $table->string('transmisi');
            $table->string('bb');
            $table->integer('status_mobil');
            $table->integer('tarif_mobil');
            $table->integer('tarif_sopir');
            $table->string('img1');
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
        Schema::dropIfExists('mobils');
    }
}
