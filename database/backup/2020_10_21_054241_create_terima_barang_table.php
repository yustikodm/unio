<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerimaBarangTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terima_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order_id')->unsigned();
            $table->integer('kirim_barang_id')->unsigned();
            $table->string('kode')->nullable();
            $table->integer('pegawai_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->datetime('tanggal_terima')->default(null);
            $table->string('status')->default('Open');
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
        Schema::drop('terima_barang');
    }
}
