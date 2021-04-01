<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityFaculties;
use Faker\Generator as Faker;

$factory->define(UniversityFaculties::class, function (Faker $faker) {
  return [
      'university_id' => $faker->numberBetween(1, 100),
      'name' => $faker->word,
      'description' => $faker->paragraph,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
  ];
});
