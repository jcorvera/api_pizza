<?php

use App\Models\Order\Topping;
use Illuminate\Database\Seeder;

class ToppingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Topping::class, 200)->create();
    }
}
