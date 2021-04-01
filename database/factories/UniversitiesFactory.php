<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\University;
use Faker\Generator as Faker;

$factory->define(University::class, function (Faker $faker) {
    return [
        'country_id' => $faker->numberBetween(1,100),
        'state_id' => $faker->numberBetween(1,100),
        'district_id' => $faker->numberBetween(1,100),
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'type' => $faker->word,
        'accreditation' => $faker->randomLetter,
        'address' => $faker->address,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
