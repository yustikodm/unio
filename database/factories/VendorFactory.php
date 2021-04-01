<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {

    return [
        'vendor_category_id' => $faker->numberBetween(1, 30),
        'name' => ucwords($faker->word),
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'phone' => $faker->randomNumber,
        'email' => $faker->email,
        'back_account_number' => $faker->bankAccountNumber,
        'website' => $faker->domainName,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
