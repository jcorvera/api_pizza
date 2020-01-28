<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Order\DeliveryAddress;
use App\Models\Order\Order;

$factory->define(DeliveryAddress::class, function (Faker $faker) {
    return [
        'order_id' => function() {
            return factory(Order::class)->create()->id;
        },
        'city' => $faker->text(50),
        'suburb'  => $faker->text(30),
        'street_or_avenue'  => $faker->text(140),
        'house_level_appartment_number'  => $faker->text(120),
        'points_reference'  => $faker->text(90)
    ];
});
