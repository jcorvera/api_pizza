<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Pizza\Pizza;
use Faker\Generator as Faker;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(145),
        'price' => $faker->randomNumber(2),
        'url_image' => $faker->imageUrl(250,250)
    ];
});
