<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->insert([

           [ 'order_detail_id' => 1, 'pizza_ingredient_id' => 1],
           [ 'order_detail_id' => 1, 'pizza_ingredient_id' => 2],
           [ 'order_detail_id' => 1, 'pizza_ingredient_id' => 7],
           [ 'order_detail_id' => 1, 'pizza_ingredient_id' => 4],
           [ 'order_detail_id' => 2, 'pizza_ingredient_id' => 15],
           [ 'order_detail_id' => 2, 'pizza_ingredient_id' => 17],
           [ 'order_detail_id' => 3, 'pizza_ingredient_id' => 22],
           [ 'order_detail_id' => 3, 'pizza_ingredient_id' => 28],
           [ 'order_detail_id' => 4, 'pizza_ingredient_id' => 31],
           [ 'order_detail_id' => 5, 'pizza_ingredient_id' => 36],
           [ 'order_detail_id' => 5, 'pizza_ingredient_id' => 37],
           [ 'order_detail_id' => 5, 'pizza_ingredient_id' => 38],
           [ 'order_detail_id' => 6, 'pizza_ingredient_id' => 54],
           [ 'order_detail_id' => 6, 'pizza_ingredient_id' => 55],
           [ 'order_detail_id' => 6, 'pizza_ingredient_id' => 56],
           [ 'order_detail_id' => 6, 'pizza_ingredient_id' => 57],
           [ 'order_detail_id' => 6, 'pizza_ingredient_id' => 58],
           [ 'order_detail_id' => 7, 'pizza_ingredient_id' => 46],
           [ 'order_detail_id' => 8, 'pizza_ingredient_id' => 17],
           [ 'order_detail_id' => 8, 'pizza_ingredient_id' => 18],
           [ 'order_detail_id' => 8, 'pizza_ingredient_id' => 20],
           [ 'order_detail_id' => 8, 'pizza_ingredient_id' => 21],
           [ 'order_detail_id' => 9, 'pizza_ingredient_id' => 59],
           [ 'order_detail_id' => 9, 'pizza_ingredient_id' => 60],
           [ 'order_detail_id' => 9, 'pizza_ingredient_id' => 61],
           [ 'order_detail_id' => 9, 'pizza_ingredient_id' => 62],
           [ 'order_detail_id' => 10, 'pizza_ingredient_id' => 40],
           [ 'order_detail_id' => 10, 'pizza_ingredient_id' => 43],
           [ 'order_detail_id' => 11, 'pizza_ingredient_id' => 54],
           [ 'order_detail_id' => 11, 'pizza_ingredient_id' => 55],
           [ 'order_detail_id' => 11, 'pizza_ingredient_id' => 56],
           [ 'order_detail_id' => 11, 'pizza_ingredient_id' => 57],
           [ 'order_detail_id' => 12, 'pizza_ingredient_id' => 30],
           [ 'order_detail_id' => 12, 'pizza_ingredient_id' => 33],
           [ 'order_detail_id' => 13, 'pizza_ingredient_id' => 1],
           [ 'order_detail_id' => 13, 'pizza_ingredient_id' => 2],
           [ 'order_detail_id' => 14, 'pizza_ingredient_id' => 60],
           [ 'order_detail_id' => 14, 'pizza_ingredient_id' => 61],
        ]);
    }
}
