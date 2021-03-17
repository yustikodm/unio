<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BarangRetur;
use Faker\Generator as Faker;

$factory->define(BarangRetur::class, function (Faker $faker) {

    return [
        'retur_barang_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'jumlah' => $faker->randomDigitNotNull,
        'jumlah_kurang' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
