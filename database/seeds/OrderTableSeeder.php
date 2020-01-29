<?php

use App\Models\Order\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 1, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 1, 'amount' => 45.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 3, 'order_type_id' => 1, 'payment_type_id' => 1, 'branch_office_id' => 1, 'amount' => 20.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 1, 'order_type_id' => 1, 'payment_type_id' => 1, 'branch_office_id' => 2, 'amount' => 45.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 4, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 1, 'amount' => 25.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 1, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 2, 'amount' => 35.50 ],
            [ 'future_order_date' => '2020-01-31', 'future_order_hour' => '12:30:00', 'user_id' => 1, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 1, 'amount' => 15.50 ],

            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 2, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 2, 'amount' => 15.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 1, 'order_type_id' => 2, 'payment_type_id' => 2, 'branch_office_id' => 1, 'amount' => 25.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 2, 'order_type_id' => 1, 'payment_type_id' => 2, 'branch_office_id' => 2, 'amount' => 35.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 7, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 2, 'amount' => 15.50 ],
            [ 'future_order_date' => null, 'future_order_hour' => null, 'user_id' => 2, 'order_type_id' => 1, 'payment_type_id' => 1, 'branch_office_id' => 1, 'amount' => 35.50 ],
            [ 'future_order_date' => '2020-01-31', 'future_order_hour' => '12:30:00', 'user_id' => 2, 'order_type_id' => 2, 'payment_type_id' => 1, 'branch_office_id' => 3, 'amount' => 15.50 ],

        ]);
    }
}
