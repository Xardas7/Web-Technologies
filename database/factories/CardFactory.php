<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();
    return [
        'user_id' => $user->id,
        'card_number' => $faker->creditCardNuber,
        'type' => $faker->creditCardType,
        'name' => $user->name,
        'surname' => $user->surname,
        'exp_date' => $faker->creditCardExpirationDate,
        'cvv' => $faker->numberBetween(100,999)
    ];
});
