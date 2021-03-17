<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LogBonus;
use Faker\Generator as Faker;

$factory->define(LogBonus::class, function (Faker $faker) {

    return [
        'mitra_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->word,
        'jumlah' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
