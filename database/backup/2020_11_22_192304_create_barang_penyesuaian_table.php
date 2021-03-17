<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPenyesuaianTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_penyesuaian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penyesuaian_stok_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('stok_database')->unsigned();
            $table->integer('stok_lapangan')->unsigned();
            $table->string('tipe');
            $table->integer('jumlah')->unsigned();
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
        Schema::drop('barang_penyesuaian');
    }
}
