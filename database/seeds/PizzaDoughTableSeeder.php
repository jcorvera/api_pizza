<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaDoughTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('pizza_doughs')->insert([
            ['pizza_id' => 1,'dough_id' => 1],
            ['pizza_id' => 1,'dough_id' => 2],
            ['pizza_id' => 1,'dough_id' => 3],
            ['pizza_id' => 1,'dough_id' => 4],
            ['pizza_id' => 1,'dough_id' => 5],

            ['pizza_id' => 2,'dough_id' => 1],
            ['pizza_id' => 2,'dough_id' => 2],
            ['pizza_id' => 2,'dough_id' => 3],
            ['pizza_id' => 2,'dough_id' => 4],

            ['pizza_id' => 3,'dough_id' => 1],
            ['pizza_id' => 3,'dough_id' => 2],
            ['pizza_id' => 3,'dough_id' => 3],
            ['pizza_id' => 3,'dough_id' => 4],

            ['pizza_id' => 4,'dough_id' => 1],
            ['pizza_id' => 4,'dough_id' => 2],
            ['pizza_id' => 4,'dough_id' => 3],
            ['pizza_id' => 4,'dough_id' => 4],

            ['pizza_id' => 5,'dough_id' => 1],
            ['pizza_id' => 5,'dough_id' => 2],
            ['pizza_id' => 5,'dough_id' => 3],
            ['pizza_id' => 5,'dough_id' => 4],

            ['pizza_id' => 6,'dough_id' => 1],
            ['pizza_id' => 6,'dough_id' => 2],
            ['pizza_id' => 6,'dough_id' => 3],
            ['pizza_id' => 6,'dough_id' => 4],

            ['pizza_id' => 7,'dough_id' => 1],
            ['pizza_id' => 7,'dough_id' => 2],
            ['pizza_id' => 7,'dough_id' => 3],
            ['pizza_id' => 7,'dough_id' => 4],

            ['pizza_id' => 8,'dough_id' => 1],
            ['pizza_id' => 8,'dough_id' => 2],
            ['pizza_id' => 8,'dough_id' => 3],
            ['pizza_id' => 8,'dough_id' => 4],

            ['pizza_id' => 9,'dough_id' => 1],
            ['pizza_id' => 9,'dough_id' => 2],
            ['pizza_id' => 9,'dough_id' => 3],
            ['pizza_id' => 9,'dough_id' => 4],

            ['pizza_id' => 10,'dough_id' => 1],
            ['pizza_id' => 10,'dough_id' => 2],
            ['pizza_id' => 10,'dough_id' => 4],
       ]);
    }
}
