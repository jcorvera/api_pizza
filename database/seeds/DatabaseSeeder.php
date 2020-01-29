<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DoughTableSeeder::class,
            BranchOfficeTableSeeder::class,
            IngredientTableSeeder::class,
            SizePizzaTableSeeder::class,
            OrderTypeTableSeeder::class,
            PaymentTypeTableSeeder::class,
            PizzaTableSeeder::class,
            PizzaDoughTableSeeder::class,
            DoughSizeTableSeeder::class,
            PizzaIngredientTableSeeder::class,
            OrderTableSeeder::class,
            DeliveryAddressTableSeeder::class,
            OrderDetailTableSeeder::class,
            ToppingTableSeeder::class
        ]);
    }
}
