<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('university_id')->unsigned();
            $table->bigInteger('faculty_id')->unsigned();
            $table->bigInteger('major_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->string('type', 255);
            $table->bigInteger('admission_fee');
            $table->bigInteger('semester_fee');
            $table->string('description', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('faculty_id')->references('id')->on('university_faculties');
            $table->foreign('major_id')->references('id')->on('university_majors');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('university_fees');
    }
}
