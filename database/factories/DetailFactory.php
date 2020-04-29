<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detail;
use Faker\Generator as Faker;

$factory->define(Detail::class, function (Faker $faker) {
    return [
        'material' => $faker->randomElement(['cotone','seta','lana','lino','cuoio','jersey','lycra','sintetico']),
        'composition' => $faker->text,
        'quantity' => $faker->numberBetween(1,10000)
    ];
});
