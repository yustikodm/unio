<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Harga;
use Faker\Generator as Faker;

$factory->define(Harga::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->randomDigitNotNull,
        'harga' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
