<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Providers\CommerceProvider;

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new CommerceProvider($faker));
    return [
        'code'=> $faker->unique()->ean13,
        'name'=> $faker->unique()->productName,
        'price'=> $faker->randomFloat('2','10','300'),
        'description'=> $faker->text,
    ];
});
