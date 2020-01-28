<?php

use Illuminate\Database\Seeder;
use App\Models\Order\PaymentType;
use Illuminate\Support\Facades\DB;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            ['name' => 'Efectivo'],
            ['name' => 'Tarjeta']
        ]);
    }
}
