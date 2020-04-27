<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create(),
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->streetAddress,
        'postal_code' => $faker->postcode,
    ];
});
