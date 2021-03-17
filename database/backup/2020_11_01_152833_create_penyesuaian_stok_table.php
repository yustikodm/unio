<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyesuaianStokTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyesuaian_stok', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->integer('barang_id')->unsigned();
            $table->integer('stok_database')->unsigned();
            $table->integer('stok_lapangan')->unsigned();
            $table->string('tipe');
            $table->integer('jumlah')->unsigned();
            $table->datetime('tanggal');            
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
        Schema::drop('penyesuaian_stok');
    }
}
