<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BoardingHouse;
use Faker\Generator as Faker;

$factory->define(BoardingHouse::class, function (Faker $faker) {

    return [
        'country_id' => $faker->randomDigitNotNull,
        'state_id' => $faker->randomDigitNotNull,
        'district_id' => $faker->randomDigitNotNull,
        'currency_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomDigitNotNull,
        'address' => $faker->word,
        'phone' => $faker->word,
        'picture' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
