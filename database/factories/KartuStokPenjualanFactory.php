<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KartuStokPenjualan;
use Faker\Generator as Faker;

$factory->define(KartuStokPenjualan::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->randomDigitNotNull,
        'penjualan_id' => $faker->randomDigitNotNull,
        'stok_awal' => $faker->randomDigitNotNull,
        'masuk' => $faker->randomDigitNotNull,
        'keluar' => $faker->randomDigitNotNull,
        'stok_akhir' => $faker->randomDigitNotNull,
        'tanggal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
