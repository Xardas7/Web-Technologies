<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(\App\Image::class, function (Faker $faker) {
    return [
        'path'=>$faker->imageUrl(),
        'product_id'=>factory(\App\Product::class)
    ];
});
