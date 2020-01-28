<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Order\BranchOffice;

$factory->define(BranchOffice::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->text(100),
        'latitude' => $faker->latitude(-90, 90) ,
        'longitude' => $faker->longitude(-180, 180)
    ];
});
