<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'size' => $faker->unique()->randomElement(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30 EU','31 EU','32 EU','33 EU','34 EU','35 EU','36 EU','37 EU','38 EU','39 EU','40 EU','41 EU','42 EU','43 EU','44 EU','XS','S','M','L','XL','3XL'])
    ];
});
