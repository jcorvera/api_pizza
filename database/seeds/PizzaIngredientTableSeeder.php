<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizza_ingredients')->insert([
            ['pizza_id' => 1 ,'ingredient_id' => 1,'extra' => 0],
            ['pizza_id' => 1 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 1 ,'ingredient_id' => 3,'extra' => 0],
            ['pizza_id' => 1 ,'ingredient_id' => 4,'extra' => 0],
            ['pizza_id' => 1 ,'ingredient_id' => 5,'extra' => 0],
            ['pizza_id' => 1 ,'ingredient_id' => 6,'extra' => 1],
            ['pizza_id' => 1 ,'ingredient_id' => 7,'extra' => 1],
            ['pizza_id' => 2 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 2 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 2 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 2 ,'ingredient_id' => 4,'extra' => 0],
            ['pizza_id' => 2 ,'ingredient_id' => 5,'extra' => 1],
            ['pizza_id' => 2 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 2 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 3 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 3 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 3 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 3 ,'ingredient_id' => 4,'extra' => 1],
            ['pizza_id' => 3 ,'ingredient_id' => 5,'extra' => 0],
            ['pizza_id' => 3 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 3 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 4 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 4 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 4 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 4 ,'ingredient_id' => 4,'extra' => 1],
            ['pizza_id' => 4 ,'ingredient_id' => 5,'extra' => 0],
            ['pizza_id' => 4 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 4 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 5 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 5 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 5 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 5 ,'ingredient_id' => 4,'extra' => 0],
            ['pizza_id' => 5 ,'ingredient_id' => 5,'extra' => 1],
            ['pizza_id' => 5 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 5 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 6 ,'ingredient_id' => 1,'extra' => 0],
            ['pizza_id' => 6 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 6 ,'ingredient_id' => 3,'extra' => 0],
            ['pizza_id' => 6 ,'ingredient_id' => 4,'extra' => 0],
            ['pizza_id' => 7 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 7 ,'ingredient_id' => 4,'extra' => 1],
            ['pizza_id' => 7 ,'ingredient_id' => 5,'extra' => 0],
            ['pizza_id' => 7 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 7 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 8 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 8 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 8 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 8 ,'ingredient_id' => 4,'extra' => 1],
            ['pizza_id' => 8 ,'ingredient_id' => 5,'extra' => 0],
            ['pizza_id' => 8 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 8 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 9 ,'ingredient_id' => 1,'extra' => 1],
            ['pizza_id' => 9 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 9 ,'ingredient_id' => 3,'extra' => 1],
            ['pizza_id' => 9 ,'ingredient_id' => 4,'extra' => 0],
            ['pizza_id' => 9 ,'ingredient_id' => 5,'extra' => 1],
            ['pizza_id' => 9 ,'ingredient_id' => 6,'extra' => 0],
            ['pizza_id' => 9 ,'ingredient_id' => 7,'extra' => 0],
            ['pizza_id' => 10 ,'ingredient_id' => 1,'extra' => 0],
            ['pizza_id' => 10 ,'ingredient_id' => 2,'extra' => 0],
            ['pizza_id' => 10 ,'ingredient_id' => 3,'extra' => 0],
            ['pizza_id' => 10 ,'ingredient_id' => 4,'extra' => 0],
        ]);
    }
}
