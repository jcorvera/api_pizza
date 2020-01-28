<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ingredients')->insert([
            ['name' => 'Carne Res'],
            ['name' => 'Jamon'],
            ['name' => 'Peperoni'],
            ['name' => 'Salchicha Italiana'],
            ['name' => 'Aceitunas Negras'],
            ['name' => 'Cebolla Morada'],
            ['name' => 'Chile Verde'],
        ]);
    }
}
