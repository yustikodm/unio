<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('university_id')->unsigned();
            $table->bigInteger('major_id')->unsigned();
            $table->string('name', 255);
            $table->integer('value');
            $table->longText('description');
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('major_id')->references('id')->on('university_majors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('university_scholarships');
    }
}
