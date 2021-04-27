<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('vendor_category_id')->unsigned();
            $table->string('name', 50);
            $table->longText('description')->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('header_img', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('bank_account_number', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->longText('address', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('vendor_category_id')->references('id')->on('vendor_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
