<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('guardian_id')->unsigned()->nullable();
            $table->string('username', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->longText('picture')->nullable();
            $table->string('school_origin', 255)->nullable();
            $table->integer('graduation_year')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('nik', 255)->nullable();
            $table->bigInteger('religion_id')->unsigned();
            $table->string('address', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guardian_id')->references('id')->on('guardians');
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
        Schema::dropIfExists('students');
    }
}
