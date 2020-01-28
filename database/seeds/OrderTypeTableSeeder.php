<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_types')->insert([
            ['name' => 'Recoger en Sucursal'],
            ['name' => 'Domicilio']
        ]);
    }
}
