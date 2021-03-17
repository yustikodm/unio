<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLogBonus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_bonus', function (Blueprint $table) {
            $table->string('kode_transaksi')->nullable()->after('jumlah');
            $table->string('nama_referral')->nullable()->after('kode_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_bonus', function (Blueprint $table) {
            //
        });
    }
}
