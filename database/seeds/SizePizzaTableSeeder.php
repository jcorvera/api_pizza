<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizePizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size_pizzas')->insert([
            ['name' => 'Super Personal (4 porciones)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grande 8 Porciones', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gigante 12 Porciones', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pizza 4', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
