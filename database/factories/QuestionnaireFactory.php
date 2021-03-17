<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Questionnaire;
use Faker\Generator as Faker;

$factory->define(Questionnaire::class, function (Faker $faker) {

    return [
        'question' => $faker->word,
        'type' => $faker->word,
        'answer_choice' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
