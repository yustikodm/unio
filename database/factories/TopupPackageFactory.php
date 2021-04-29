<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TopupPackage;
use Faker\Generator as Faker;

$factory->define(TopupPackage::class, function (Faker $faker) {

    return [
        'code' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->text,
        'amount' => $faker->randomDigitNotNull,
        'due_date' => $faker->date('Y-m-d H:i:s'),
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
