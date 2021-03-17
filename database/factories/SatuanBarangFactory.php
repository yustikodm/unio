<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SatuanBarang;
use Faker\Generator as Faker;

$factory->define(SatuanBarang::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
