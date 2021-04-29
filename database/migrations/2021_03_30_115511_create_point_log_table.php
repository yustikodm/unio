<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointLogTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('point_log', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('parent_id')->unsigned();
      $table->bigInteger('transaction_id')->unsigned()->nullable();
      $table->char('transaction_type')->nullable();
      $table->decimal('point_before', 10, 2);
      $table->decimal('point_after', 10, 2);
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('parent_id')->references('parent_user')->on('families');
      $table->foreign('transaction_id')->references('id')->on('point_transactions');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('point_log');
  }
}
