<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReviewMajors;
use Faker\Generator as Faker;

$factory->define(ReviewMajors::class, function (Faker $faker) {

    return [
        'majors_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'message' => $faker->text,
        'rating' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
