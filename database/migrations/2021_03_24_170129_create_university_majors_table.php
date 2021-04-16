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
            $table->longText('level')->nullable();
            $table->char('accreditation')->nullable();
            $table->string('description', 255)->nullable();
            $table->bigInteger('master_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('faculty_id')->references('id')->on('university_faculties');
            $table->foreign('master_id')->references('id')->on('master_majors');
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
