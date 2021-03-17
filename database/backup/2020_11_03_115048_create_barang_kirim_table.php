<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKirimTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_kirim', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kirim_barang_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('jumlah_kurang')->unsigned();
            $table->string('status')->default('open');
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
        Schema::drop('barang_kirim');
    }
}
