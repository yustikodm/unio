<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->integer('pelanggan_id')->unsigned();
            $table->bigIntegerUnsigned('level_mitra_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->bigIntegerUnsigned('user_id');
            $table->bigIntegerUnsigned('referral_id');
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
        Schema::drop('mitra');
    }
}
