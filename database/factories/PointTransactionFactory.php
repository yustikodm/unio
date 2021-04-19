<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PointTransaction;
use Faker\Generator as Faker;

$factory->define(PointTransaction::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
