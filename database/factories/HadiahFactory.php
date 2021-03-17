<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hadiah;
use Faker\Generator as Faker;

$factory->define(Hadiah::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->word,
        'poin' => $faker->randomDigitNotNull,
        'stok' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
