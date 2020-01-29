<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_addresses')->insert([
            [ 'order_id' =>  1, 'city' => 'San Salvador', 'suburb' => 'San Jose Abajo' , 'street_or_avenue' => 'Calle las pavas', 'house_level_appartment_number' =>  'Casa numero 25', 'points_reference' => 'Frente al arbol de mango' ],
            [ 'order_id' =>  4, 'city' => 'Mexicanos', 'suburb' => 'San Jose Abajo' , 'street_or_avenue' => 'Calle las olivas', 'house_level_appartment_number' =>  'Casa numero 28', 'points_reference' => 'Frente a la tienda' ],
            [ 'order_id' =>  5, 'city' => 'Quezaltepeque', 'suburb' => 'San Jose Arriba' , 'street_or_avenue' => 'Calle las pavas', 'house_level_appartment_number' =>  'Casa numero 22', 'points_reference' => 'Frente a la gasolinera' ],
            [ 'order_id' =>  6, 'city' => 'Soyapango', 'suburb' => 'San Jose Arriba' , 'street_or_avenue' => 'Calle san jose', 'house_level_appartment_number' =>  'Casa numero 28', 'points_reference' => 'Frente al arbol de mango' ],
            [ 'order_id' =>  7, 'city' => 'Santa Tecla', 'suburb' => 'San Jose Abajo' , 'street_or_avenue' => 'Calle las naranjas', 'house_level_appartment_number' =>  'Casa numero 29', 'points_reference' => 'Frente al arbol de mango' ],
            [ 'order_id' =>  8, 'city' => 'Santa Tecla', 'suburb' => 'San Jose Arriba' , 'street_or_avenue' => 'Calle las pavas', 'house_level_appartment_number' =>  'Casa numero 20', 'points_reference' => 'Frente al banco agricola' ],
            [ 'order_id' =>  9, 'city' => 'Quezaltepeque', 'suburb' => 'San Pedro Abajo' , 'street_or_avenue' => 'Calle las pavas', 'house_level_appartment_number' =>  'Casa numero 12', 'points_reference' => 'Frente al banco azul' ],
            [ 'order_id' =>  10, 'city' => 'San Salvador', 'suburb' => 'San Jose Acuste' , 'street_or_avenue' => 'Calle las praderas', 'house_level_appartment_number' =>  'Casa numero 43', 'points_reference' => 'Frente al arbol de mango' ]
        ]);
    }
}
