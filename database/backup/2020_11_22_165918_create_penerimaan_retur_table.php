<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanReturTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_retur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->integer('retur_barang_id')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->text('keterangan');
            $table->datetime('tanggal')->nullable();
            $table->string('status')->nullable()->default("Open");
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
        Schema::drop('penerimaan_retur');
    }
}
