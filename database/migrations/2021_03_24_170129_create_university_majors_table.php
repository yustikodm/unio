<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_majors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('university_id')->unsigned();
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->string('name', 255);
            $table->longText('description')->nullable();
            $table->char('accreditation')->nullable();
            $table->string('temp', 255)->nullable();
            $table->bigIncrements('master_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('faculty_id')->references('id')->on('university_faculties');
            $table->foreign('master_majors')->references('id')->on('master_majors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('university_majors');
    }
}
