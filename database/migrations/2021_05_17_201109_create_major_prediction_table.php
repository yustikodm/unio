<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorPredictionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_prediction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('major_id');
            $table->string('major_name');
            $table->string('fos');
            $table->enum('man_check', ['UNCHECK', 'CHECKED'])->default('UNCHECK');
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
        Schema::drop('major_prediction');
    }
}
