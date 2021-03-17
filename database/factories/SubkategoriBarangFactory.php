<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubkategoriBarang;
use Faker\Generator as Faker;

$factory->define(SubkategoriBarang::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
