<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityMajor;
use Faker\Generator as Faker;

$factory->define(UniversityMajor::class, function (Faker $faker) {

    return [
        'university_id' => $faker->randomDigitNotNull,
        'faculty_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->word,
        'accreditation' => $faker->word,
        'temp' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
