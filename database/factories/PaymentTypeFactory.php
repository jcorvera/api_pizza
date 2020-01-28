<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Order\PaymentType;

$factory->define(PaymentType::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
