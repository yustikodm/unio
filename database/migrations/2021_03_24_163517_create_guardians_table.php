<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('guardian_id');
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('name', 255);
            $table->longText('picture');
            $table->date('birth_date');
            $table->string('birth_place', 255);
            $table->string('email', 255);
            $table->string('nik', 255);
            $table->bigInteger('religion_id')->unsigned()->nullable();
            $table->string('address' . 255);
            $table->string('phone', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
