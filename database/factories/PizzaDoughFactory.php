<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pizza\Dough;
use App\Models\Pizza\Pizza;
use Faker\Generator as Faker;
use App\Models\Pizza\PizzaDough;

$factory->define(PizzaDough::class, function (Faker $faker) {
    return [
        'pizza_id' => function () {
            return factory(Pizza::class)->create()->id;
        },
        'dough_id' => function() {
            return factory(Dough::class)->create()->id;
        }
    ];
});
