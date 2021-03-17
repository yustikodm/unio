<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapStokTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_stok', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('stok_awal')->unsigned();
            $table->integer('masuk')->unsigned();
            $table->integer('keluar')->unsigned();
            $table->integer('stok_akhir')->unsigned();
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
        Schema::drop('rekap_stok');
    }
}
