<?php

use App\Models\Pizza\PizzaDough;
use Illuminate\Database\Seeder;

class PizzaDoughTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PizzaDough::class, 130)->create();
    }
}
