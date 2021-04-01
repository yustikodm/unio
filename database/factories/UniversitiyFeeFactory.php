<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityFee;
use Faker\Generator as Faker;

$factory->define(UniversityFee::class, function (Faker $faker) {
    return [      
      'university_id' => $faker->numberBetween(1, 100),
      'faculty_id' => $faker->numberBetween(1,100),
      'major_id' => $faker->numberBetween(1,100),
      'type' => $faker->word,
      'admission_fee' => $faker->randomDigit,
      'semester_fee' => $faker->randomDigit,
      'description' => $faker->paragraph,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ];
});