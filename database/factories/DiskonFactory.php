<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Diskon;
use Faker\Generator as Faker;

$factory->define(Diskon::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->word,
        'diskon' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
