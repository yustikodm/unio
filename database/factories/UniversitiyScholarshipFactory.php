<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityScholarship;
use Faker\Generator as Faker;

$factory->define(UniversityScholarship::class, function (Faker $faker) {
    return [
        'university_id' => $faker->numberBetween(1, 30),
        'year' => $faker->year,
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
