<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('countries', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->char('code', 3)->nullable();
      $table->string('name', 255);
      $table->string('region')->nullable();
      $table->char('currency_code')->nullable();
      $table->string('currency_name', 255)->nullable();
      $table->char('calling_code', 10)->nullable();
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
    Schema::dropIfExists('countries');
  }
}
