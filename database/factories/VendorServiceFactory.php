<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VendorService;
use Faker\Generator as Faker;

$factory->define(VendorService::class, function (Faker $faker) {

    return [
        'vendor_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->text,
        'picture' => $faker->text,
        'price' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
