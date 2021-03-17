<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityScholarship;
use Faker\Generator as Faker;

$factory->define(UniversityScholarship::class, function (Faker $faker) {

    return [
        'university_id' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'picture' => $faker->text,
        'year' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
