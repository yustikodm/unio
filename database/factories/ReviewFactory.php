<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'entity_id' => $faker->randomDigitNotNull,
        'entity_name' => $faker->word,
        'message' => $faker->text,
        'rating' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
