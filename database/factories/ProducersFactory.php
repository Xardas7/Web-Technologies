<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producer;
use Faker\Generator as Faker;

$factory->define(Producer::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->company,
        'logo'=>'\'https://picsum.photos/seed/picsum/50/50\''
    ];
});
