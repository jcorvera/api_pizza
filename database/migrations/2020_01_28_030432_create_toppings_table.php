<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toppings', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_detail_id');
            $table->unsignedBigInteger('pizza_ingredient_id');
            $table->timestamps();

            $table->foreign('order_detail_id')
            ->references('id')->on('order_details')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('pizza_ingredient_id')
            ->references('id')->on('pizza_ingredients')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toppings');
    }
}
