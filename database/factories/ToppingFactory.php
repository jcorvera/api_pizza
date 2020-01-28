<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\OrderDetail;
use App\Models\Order\Topping;
use App\Models\Pizza\PizzaIngredient;
use Faker\Generator as Faker;


$factory->define(Topping::class, function (Faker $faker) {
    return [
        'order_detail_id' => function() {
            return factory(OrderDetail::class)->create()->id;
        },
        'pizza_ingredient_id' => function() {
            return factory(PizzaIngredient::class)->create()->id;
        }
    ];
});
