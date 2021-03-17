<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Poin;
use Faker\Generator as Faker;

$factory->define(Poin::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'poin' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
