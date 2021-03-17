<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryKlaimHadiahTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_klaim_hadiah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hadiah_id')->unsigned();
            $table->integer('mitra_id')->unsigned();
            $table->text('keterangan');
            $table->string('status');
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
        Schema::drop('history_klaim_hadiah');
    }
}
