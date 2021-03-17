<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MutasiKas;
use Faker\Generator as Faker;

$factory->define(MutasiKas::class, function (Faker $faker) {

    return [
        'tipe' => $faker->word,
        'keterangan' => $faker->text,
        'jumlah' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
