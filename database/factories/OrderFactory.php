<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\BranchOffice;
use App\Models\Order\Order;
use App\Models\Order\OrderType;
use App\Models\Order\PaymentType;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'future_order_date' => $faker->date('Y-m-d','now'),
        'future_orde_hour' => $faker->time('H:i:s','now'),
        'user_id' => function () { return factory(User::class)->create()->id; },
        'order_type_id' => function () { factory(OrderType::class)->create()->id; },
        'payment_type_id' => function () { factory(PaymentType::class)->create()->id; },
        'branch_office_id' =>  function () { factory(BranchOffice::class)->create()->id; },
        'amount' => $faker->randomNumber(2),
    ];
});
