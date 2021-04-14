<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityFacility;
use Faker\Generator as Faker;

$factory->define(UniversityFacility::class, function (Faker $faker) {

    return [
        'university_id' => $faker->numberBetween(1,100),
        'name' => $faker->word,
        'description' => $faker->text,
        'amount' => $faker->randomDigit,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
