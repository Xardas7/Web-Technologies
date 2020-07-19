<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producer;
use Faker\Generator as Faker;

$factory->define(Producer::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->company,
        'user_id' => $faker->unique()->numberBetween(1,50)
    ];
});
