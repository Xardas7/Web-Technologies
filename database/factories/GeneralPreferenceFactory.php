<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GeneralPreferences;
use Faker\Generator as Faker;

$factory->define(GeneralPreferences::class, function (Faker $faker) {
    return [
        'weight-unit' => $faker->randomElement(['kg','lb']),
        'length-unit' => $faker->randomElement(['cm','m','in']),
        'height' => $faker->randomElement(['feet','centimeters']),
        'value' => $faker->randomElement(['dollar','euro'])
    ];
});
