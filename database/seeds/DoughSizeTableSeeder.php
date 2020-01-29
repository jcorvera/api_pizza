<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoughSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dough_sizes')->insert([
            
            ['dough_id' => 1, 'size_pizza_id'=> 1,'price'=> 1.50 ],
            ['dough_id' => 1, 'size_pizza_id'=> 2,'price'=> 5.50 ],
            ['dough_id' => 1, 'size_pizza_id'=> 3,'price'=> 2.50 ],
            ['dough_id' => 1, 'size_pizza_id'=> 4,'price'=> 6.50 ],

            ['dough_id' => 2, 'size_pizza_id'=> 1,'price'=> 1.50 ],
            ['dough_id' => 2, 'size_pizza_id'=> 2,'price'=> 1.50 ],
            ['dough_id' => 2, 'size_pizza_id'=> 3,'price'=> 7.50 ],
            ['dough_id' => 2, 'size_pizza_id'=> 4,'price'=> 6.50 ],

            ['dough_id' => 3, 'size_pizza_id'=> 1,'price'=> 1.50 ],
            ['dough_id' => 3, 'size_pizza_id'=> 2,'price'=> 1.50 ],
            ['dough_id' => 3, 'size_pizza_id'=> 3,'price'=> 7.50 ],
            ['dough_id' => 3, 'size_pizza_id'=> 4,'price'=> 6.50 ],

            ['dough_id' => 4, 'size_pizza_id'=> 1,'price'=> 1.50 ],
            ['dough_id' => 4, 'size_pizza_id'=> 2,'price'=> 5.50 ],
            ['dough_id' => 4, 'size_pizza_id'=> 3,'price'=> 2.50 ],
            ['dough_id' => 4, 'size_pizza_id'=> 4,'price'=> 6.50 ],

            ['dough_id' => 5, 'size_pizza_id'=> 1,'price'=> 4.50 ],
            ['dough_id' => 5, 'size_pizza_id'=> 2,'price'=> 5.50 ],
            ['dough_id' => 5, 'size_pizza_id'=> 3,'price'=> 7.50 ],
            ['dough_id' => 5, 'size_pizza_id'=> 4,'price'=> 6.50 ],
        ]);
    }
}
