<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producer;
use Faker\Generator as Faker;

$factory->define(Producer::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->company,
        'logo' => $faker->imageUrl(60,60),
        //  'logo'=>'https://i.picsum.photos/id/'.$faker->numberBetween(1,1000).'/250/250.jpg',
        'user_id' => $faker->unique()->numberBetween(1,50)
    ];
});
