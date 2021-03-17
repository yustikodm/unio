<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuestionnaireAnswer;
use Faker\Generator as Faker;

$factory->define(QuestionnaireAnswer::class, function (Faker $faker) {

    return [
        'questionairre_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'answer' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
