<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(PurchaseOrder::class, function (Faker $faker) {

    return [
        'kode' => $faker->word,
        'tanggal' => $faker->word,
        'pegawai_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
        'status' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
