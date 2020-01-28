<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\Pizza\Ingredient;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
