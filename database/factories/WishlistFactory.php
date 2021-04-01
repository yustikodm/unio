<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Wishlist;
use Faker\Generator as Faker;

$factory->define(Wishlist::class, function (Faker $faker) {
    return [
        'university_id' => $faker->numberBetween(1, 30),
        'major_id' => $faker->numberBetween(1, 50),
        'service_id' => $faker->numberBetween(1, 30),
        'user_id' => $faker->numberBetween(1, 3),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
