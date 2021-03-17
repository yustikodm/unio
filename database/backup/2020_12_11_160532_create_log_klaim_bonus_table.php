<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogKlaimBonusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_klaim_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mitra_id')->unsigned();
            $table->text('keterangan');
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
        Schema::drop('log_klaim_bonus');
    }
}
