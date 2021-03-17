<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DetailPenjualan;
use Faker\Generator as Faker;

$factory->define(DetailPenjualan::class, function (Faker $faker) {

    return [
        'penjualan_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'catatan' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
