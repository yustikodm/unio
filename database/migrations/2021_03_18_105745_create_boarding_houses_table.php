<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHousesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('district_id');
            $table->integer('currency_id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('address');
            $table->string('phone');
            $table->string('picture');
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
        Schema::drop('boarding_houses');
    }
}
