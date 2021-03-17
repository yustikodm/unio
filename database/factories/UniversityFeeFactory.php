<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UniversityFee;
use Faker\Generator as Faker;

$factory->define(UniversityFee::class, function (Faker $faker) {

    return [
        'university_id' => $faker->randomDigitNotNull,
        'faculty_id' => $faker->randomDigitNotNull,
        'major_id' => $faker->randomDigitNotNull,
        'currency_id' => $faker->randomDigitNotNull,
        'type' => $faker->word,
        'admission_fee' => $faker->word,
        'semester_fee' => $faker->word,
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
