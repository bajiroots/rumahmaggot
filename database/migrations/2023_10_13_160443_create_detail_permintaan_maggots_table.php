<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPermintaanMaggotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_permintaan_maggots', function (Blueprint $table) {
            $table->id();
            // $table->date('tanggal_pengiriman');
            $table->integer('jumlah_pengiriman');
            $table->enum('status_pengiriman', ['diterima','dikirim'])->default('dikirim');
            $table->enum('status_pembayaran', ['diterima','menunggu'])->default('menunggu');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permintaan_maggots_id');
            $table->timestamps();

            $table->foreign('permintaan_maggots_id')->references('id')->on('permintaan_maggots');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_permintaan_maggots');
    }
}
