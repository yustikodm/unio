<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PlaceToLive;
use Faker\Generator as Faker;

$factory->define(PlaceToLive::class, function (Faker $faker) {

    return [
        'country_id' => $faker->numberBetween(1,200),
        'state_id' => $faker->numberBetween(1,3),
        'district_id' => $faker->numberBetween(1,3),
        'name' => $faker->word(5),
        'description' => $faker->paragraph,
        'price' => $faker->randomDigit,
        'address' => $faker->address,
        'phone' => $faker->randomDigit,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
