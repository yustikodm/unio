<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LogKlaimBonus;
use Faker\Generator as Faker;

$factory->define(LogKlaimBonus::class, function (Faker $faker) {

    return [
        'mitra_id' => $faker->randomDigitNotNull,
        'keterangan' => $faker->text,
        'jumlah' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
