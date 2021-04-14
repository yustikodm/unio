<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityFacilitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('university_id')->unsigned();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('university_id')->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('university_facilities');
    }
}
