<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female', 'undefined']);
    $name = $faker->firstName;
    $surname = $faker->lastName;
    return [
        'name' => $name,
        'surname' => $surname,
        'sex' => $gender,
        'email' => strtolower($name) . '.' . strtolower($surname) . '@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt($faker->password(8)),
        'remember_token' => Str::random(10),
    ];
});
