<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MajorPrediction;
use Faker\Generator as Faker;

$factory->define(MajorPrediction::class, function (Faker $faker) {

    return [
        'major_id' => $faker->randomDigitNotNull,
        'major_name' => $faker->word,
        'fos' => $faker->word,
        'man_check' => $faker->randomElement(['CHECKED']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
