<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bintang;
use Faker\Generator as Faker;

$factory->define(Bintang::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'bintang' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
