<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceToLiveTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('place_to_live', function (Blueprint $table) {
      $table->increments('id');
      $table->bigInteger('country_id')->unsigned();
      $table->bigInteger('state_id')->unsigned();
      $table->bigInteger('district_id')->unsigned();
      $table->string('name');
      $table->text('description');
      $table->integer('price');
      $table->string('address');
      $table->string('phone');
      $table->string('picture');
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('country_id')->references('id')->on('countries');
      $table->foreign('state_id')->references('id')->on('states');
      $table->foreign('district_id')->references('id')->on('districts');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('place_to_live');
  }
}
