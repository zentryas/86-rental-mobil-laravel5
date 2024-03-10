<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('mobil_id');
            $table->string('kode_booking');
            $table->date('tgl_booking');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('status_booking');
            $table->integer('durasi');
            $table->string('paket');
            $table->integer('jml_bayar');
            $table->integer('jml_dp');
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
        Schema::dropIfExists('bookings');
    }
}
