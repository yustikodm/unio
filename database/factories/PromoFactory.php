<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'tanggal_mulai' => $faker->word,
        'tanggal_berakhir' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
