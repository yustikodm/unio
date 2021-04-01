<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityRequirement;
use Faker\Generator as Faker;

$factory->define(UniversityRequirement::class, function (Faker $faker) {
    return [
        'university_id' => $faker->numberBetween(1,100),
        'major_id' => $faker->numberBetween(1,100),
        'name' => $faker->word,
        'value' => $faker->randomDigit,
        'description' => $faker->paragraph,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
