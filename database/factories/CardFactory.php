<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'card_number' => $faker->creditCardNumber,
        'type' => $faker->creditCardType,
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'exp_date' => $faker->creditCardExpirationDate,
        'cvv' => $faker->numberBetween(100,999)
    ];
});
