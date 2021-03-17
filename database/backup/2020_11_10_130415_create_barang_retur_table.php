<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangReturTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_retur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retur_barang_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('jumlah_kurang')->unsiged();
            $table->string('status')->nullable()->default('open');
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
        Schema::drop('barang_retur');
    }
}
