<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPenerimaanTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_penerimaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penerimaan_retur_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->text('keterangan')->nullable();
            $table->integer('jumlah')->unsigned();
            $table->integer('jumlah_kurang')->unsigned();
            $table->string('status')->default("Open");
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
        Schema::drop('barang_penerimaan');
    }
}
