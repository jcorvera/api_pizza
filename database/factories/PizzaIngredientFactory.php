<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pizza\Ingredient;
use App\Models\Pizza\Pizza;
use Faker\Generator as Faker;
use App\Models\Pizza\PizzaIngredient;

$factory->define(PizzaIngredient::class, function (Faker $faker) {
    return [
        'pizza_id' => function() {
            return factory(Pizza::class)->create()->id;
        },
        'ingredient_id' => function() {
            return factory(Ingredient::class)->create()->id;
        },
        'extra' => rand(0,1),
        'price' => $faker->randomNumber(2),
    ];
});
