<?php

use App\Models\Pizza\PizzaIngredient;
use Illuminate\Database\Seeder;

class PizzaIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PizzaIngredient::class, 100)->create();
    }
}
