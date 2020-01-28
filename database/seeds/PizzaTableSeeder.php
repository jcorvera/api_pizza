<?php

use App\Models\Pizza\Pizza;
use Illuminate\Database\Seeder;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
        *
        * @return void
     */
    public function run()
    {
        factory(Pizza::class, 10)->create();
    }
}
