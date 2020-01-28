<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoughTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doughs')->insert([
            ['name' => 'Pan'],
            ['name' => 'Delgada'],
            ['name' => 'Hut Cheese'],
            ['name' => 'Hut Cheese Gold'],
            ['name' => 'Pan Gold'],
        ]);
    }
}
