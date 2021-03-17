<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'kadaluarsa' => $faker->date('Y-m-d H:i:s'),
        'diskon' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
