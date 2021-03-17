<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PenerimaanRetur;
use Faker\Generator as Faker;

$factory->define(PenerimaanRetur::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'retur_barang_id' => $faker->randomDigitNotNull,
        'pegawai_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->text,
        'tanggal' => $faker->date('Y-m-d H:i:s'),
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
