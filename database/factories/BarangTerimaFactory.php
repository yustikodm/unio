<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BarangTerima;
use Faker\Generator as Faker;

$factory->define(BarangTerima::class, function (Faker $faker) {

    return [
        'kirim_barang_id' => $faker->randomDigitNotNull,
        'terima_barang_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'harga' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
