<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'=> $faker->streetName,
        'name'=> $faker->name,
        'price'=> $faker->randomFloat('2','10','300'),
        'description'=> $faker->text,
        'producer_id'=> factory(\App\Producers::class)
    ];
});
