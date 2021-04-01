<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VendorService;
use Faker\Generator as Faker;

$factory->define(VendorService::class, function (Faker $faker) {

    return [
        'vendor_id' => $faker->numberBetween(1, 50),
        'name' => $faker->word(5),
        'description' => $faker->paragraph,
        'price' => $faker->randomDigit,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
