<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTransactionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('transactions', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')->unsigned();
      $table->string('code')->unique()->nullable();
      $table->decimal('grand_total', 10, 2);
      $table->char('status')->default('pending');
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
    Schema::dropIfExists('transactions');
  }
}
