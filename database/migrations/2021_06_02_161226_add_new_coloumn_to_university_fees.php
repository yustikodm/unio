<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColoumnToUniversityFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('university_fees', function (Blueprint $table) {
            $table->bigInteger('fee')->after('type');
            $table->integer('period')->after('fee');
            $table->string('period_unit')->after('period');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('university_fees', function (Blueprint $table) {
            //
        });
    }
}
