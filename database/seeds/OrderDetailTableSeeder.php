<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            ['order_id' => 1, 'pizza_id' => 1, 'dough_size_id' => 2],
            ['order_id' => 2, 'pizza_id' => 3, 'dough_size_id' => 11],
            ['order_id' => 2, 'pizza_id' => 4, 'dough_size_id' => 4],
            ['order_id' => 3, 'pizza_id' => 5, 'dough_size_id' => 8],
            ['order_id' => 4, 'pizza_id' => 6, 'dough_size_id' => 9],
            ['order_id' => 5, 'pizza_id' => 9, 'dough_size_id' => 13],
            ['order_id' => 6, 'pizza_id' => 8, 'dough_size_id' => 7],
            ['order_id' => 7, 'pizza_id' => 3, 'dough_size_id' => 14],
            ['order_id' => 9, 'pizza_id' => 10, 'dough_size_id' => 9],
            ['order_id' => 9, 'pizza_id' => 7, 'dough_size_id' => 10],
            ['order_id' => 10, 'pizza_id' => 9, 'dough_size_id' => 12],
            ['order_id' => 11, 'pizza_id' => 5 , 'dough_size_id' => 18],
            ['order_id' => 12, 'pizza_id' => 1, 'dough_size_id' => 20],
            ['order_id' => 12, 'pizza_id' => 10, 'dough_size_id' => 17],
        ]);
        
    }
}
