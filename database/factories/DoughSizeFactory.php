<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pizza\Dough;
use Faker\Generator as Faker;
use App\Models\Pizza\DoughSize;
use App\Models\Pizza\SizePizza;

$factory->define(DoughSize::class, function (Faker $faker) {
    return [
        'dough_id' =>  function (){
            return factory(Dough::class)->create()->id;
        },
        'size_pizza_id' =>  function (){
            return factory(SizePizza::class)->create()->id;
        },
        'price' => $faker->randomNumber(2)
    ];
});
