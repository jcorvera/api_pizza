<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Order\OrderType;

$factory->define(OrderType::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
