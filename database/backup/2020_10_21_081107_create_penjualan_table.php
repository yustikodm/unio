<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->bigInteger('pelanggan_id')->unsigned()->nullable();
            $table->bigInteger('mitra_id')->unsigned()->nullable();
            $table->integer('ppn')->unsigned()->nullable();
            $table->integer('diskon')->unsigned()->nullable();
            $table->bigInteger('total')->unsigned()->nullable();
            $table->bigInteger('bayar')->unsigned()->nullable();
            $table->bigInteger('kembali')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penjualan');
    }
}
