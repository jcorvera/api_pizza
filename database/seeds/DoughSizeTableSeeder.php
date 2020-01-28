<?php

use App\Models\Pizza\DoughSize;
use Illuminate\Database\Seeder;

class DoughSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DoughSize::class, 40)->create();
    }
}
