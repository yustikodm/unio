<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KartuStokReturBarang;
use Faker\Generator as Faker;

$factory->define(KartuStokReturBarang::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->randomDigitNotNull,
        'retur_barang_id' => $faker->randomDigitNotNull,
        'stok_awal' => $faker->randomDigitNotNull,
        'retur' => $faker->randomDigitNotNull,
        'stok_akhir' => $faker->randomDigitNotNull,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
