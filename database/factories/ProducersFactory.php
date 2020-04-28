<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producers;
use Faker\Generator as Faker;

$factory->define(Producers::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'logo'=>$faker->imageUrl()
    ];
});
