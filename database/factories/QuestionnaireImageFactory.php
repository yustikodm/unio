<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuestionnaireImage;
use Faker\Generator as Faker;

$factory->define(QuestionnaireImage::class, function (Faker $faker) {

    return [
        'src' => $faker->text,
        'type' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
