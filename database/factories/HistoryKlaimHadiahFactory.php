<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HistoryKlaimHadiah;
use Faker\Generator as Faker;

$factory->define(HistoryKlaimHadiah::class, function (Faker $faker) {

    return [
        'hadiah_id' => $faker->randomDigitNotNull,
        'mitra_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
