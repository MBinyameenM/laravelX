<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'price' => $faker->randomNumber,
        'description' => $faker->text(),
    ];
});
