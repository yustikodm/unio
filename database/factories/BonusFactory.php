<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bonus;
use Faker\Generator as Faker;

$factory->define(Bonus::class, function (Faker $faker) {

    return [
        'mitra_id' => $faker->randomDigitNotNull,
        'bonus' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
