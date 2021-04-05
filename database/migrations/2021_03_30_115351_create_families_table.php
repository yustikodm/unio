<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('families', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('parent_user')->unsigned();
      $table->bigInteger('child_user')->unsigned();
      $table->string('family_as', 100);
      $table->dateTime('family_verified_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('parent_user')->references('id')->on('users');
      $table->foreign('child_user')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('family');
  }
}
