<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Pizza\Dough;
use Faker\Generator as Faker;

$factory->define(Dough::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
