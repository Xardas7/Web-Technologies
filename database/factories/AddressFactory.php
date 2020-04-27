<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->streetAddress,
        'type' => $faker->randomElement(['billing','delivery','both']),
        'postal_code' => $faker->postcode,
    ];
});
