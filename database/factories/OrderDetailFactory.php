<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\Order;
use Faker\Generator as Faker;
use App\Models\Order\OrderDetail;
use App\Models\Pizza\DoughSize;
use App\Models\Pizza\Pizza;

$order = factory(Order::class)->create()->id;

$factory->define(OrderDetail::class, function (Faker $faker) use ($order) {
    return [
        'order_id' => $order,
        'pizza_id' => function(){
            return  factory(Pizza::class)->create()->id;
        },
        'dough_size_id' => function() {
            return factory(DoughSize::class)->create()->id;
        }
    ];
});

$factory->define(OrderDetail::class, function (Faker $faker) use ($order) {
    return [
        'order_id' => $order,
        'pizza_id' => function(){
            return  factory(Pizza::class)->create()->id;
        },
        'dough_size_id' => function() {
            return factory(DoughSize::class)->create()->id;
        }
    ];
});

$factory->define(OrderDetail::class, function (Faker $faker) use ($order) {
    return [
        'order_id' => $order,
        'pizza_id' => function(){
            return  factory(Pizza::class)->create()->id;
        },
        'dough_size_id' => function() {
            return factory(DoughSize::class)->create()->id;
        }
    ];
});
