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
            $table->bigInteger('vendor_category_id')->unsigned();
            $table->string('name', 50);
            $table->longText('description');
            $table->longText('picture');
            $table->string('email', 255)->nullable();
            $table->string('back_account_number', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
