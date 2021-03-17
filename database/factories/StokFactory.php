<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stok;
use Faker\Generator as Faker;

$factory->define(Stok::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->randomDigitNotNull,
        'stok' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
