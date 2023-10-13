<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanMaggotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_maggots', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_permintaan');   
            $table->integer('harga');   
            $table->date('tanggal_permintaan');
            $table->date('tanggal_akhir_permintaan');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_id');
            $table->enum('status', ['aktif','tutup'])->default('tutup');
            // $table->enum('jenis_maggot', ['basah','kering'])->default('basah');
            $table->string('lokasi_pengantaran');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produk_id')->references('id')->on('produk_maggots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_maggots');
    }
}
