<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityMajor;
use Faker\Generator as Faker;

$factory->define(UniversityMajor::class, function (Faker $faker) {
    return [
      'university_id' => $faker->numberBetween(1,100),
      'faculty_id' => $faker->numberBetween(1,100),
      'name' => $faker->word,
      'description' => $faker->paragraph,
      'accreditation' => $faker->randomLetter,
      'temp' => $faker->word,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ];
});
