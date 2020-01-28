<?php

use App\Models\Order\DeliveryAddress;
use Illuminate\Database\Seeder;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DeliveryAddress::class, 40)->create();
    }
}
