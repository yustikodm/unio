<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPenjualanTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('penjualan_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->bigInteger('harga')->unsigned();
            $table->bigInteger('jumlah')->unsigned();
            $table->bigInteger('subtotal')->unsigned();
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
        Schema::drop('barang_penjualan');
    }
}
