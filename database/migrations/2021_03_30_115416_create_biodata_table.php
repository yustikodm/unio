<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('biodata', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')->unsigned();
      $table->string('fullname', 255);
      $table->longText('address')->nullable();
      $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
      $table->string('picture', 255)->nullable();
      $table->string('school_origin', 255)->nullable();
      $table->date('graduation_year')->nullable();
      $table->string('birth_place')->nullable();
      $table->date('birth_date')->nullable();
      $table->string('identity_number', 255)->nullable();
      $table->string('religion')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('biodata');
  }
}
