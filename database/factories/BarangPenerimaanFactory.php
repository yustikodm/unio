<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BarangPenerimaan;
use Faker\Generator as Faker;

$factory->define(BarangPenerimaan::class, function (Faker $faker) {

    return [
        'penerimaan_retur_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->word,
        'jumlah' => $faker->randomDigitNotNull,
        'jumlah_kurang' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
