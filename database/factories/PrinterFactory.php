<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Printer;
use Faker\Generator as Faker;

$factory->define(Printer::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'default' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
