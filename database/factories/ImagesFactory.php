<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(\App\Image::class, function (Faker $faker) {
    return [
        'path'=>'https://i.picsum.photos/id/'.$faker->numberBetween(1,300).'/540/600.jpg',
    ];
});
