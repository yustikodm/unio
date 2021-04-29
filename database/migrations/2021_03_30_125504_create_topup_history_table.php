<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopupHistoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('topup_history', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')->unsigned();
      $table->bigInteger('country_id')->unsigned();
      $table->string('code')->unique()->nullable();
      $table->decimal('amount', 10, 2);
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('country_id')->references('id')->on('countries');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('point_topup');
  }
}