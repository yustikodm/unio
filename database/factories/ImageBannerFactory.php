<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ImageBanner;
use Faker\Generator as Faker;

$factory->define(ImageBanner::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'src' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
