<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DetailPurchaseOrder;
use Faker\Generator as Faker;

$factory->define(DetailPurchaseOrder::class, function (Faker $faker) {

    return [
        'purchase_order_id' => $faker->randomDigitNotNull,
        'barang_id' => $faker->randomDigitNotNull,
        'harga' => $faker->randomDigitNotNull,
        'stok' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
