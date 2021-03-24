<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('questionairre_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('answer', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('questionairre_id')->references('id')->on('questionnaires');
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
        Schema::dropIfExists('questionnaire_answers');
    }
}
