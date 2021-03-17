<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->string('nomor_ktp')->nullable()->change();
            $table->string('jenis_kelamin')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->integer('pekerjaan_id')->nullable()->change();
            $table->string('telepon')->nullable()->change();
            $table->date('tanggal_daftar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
        });
    }
}
