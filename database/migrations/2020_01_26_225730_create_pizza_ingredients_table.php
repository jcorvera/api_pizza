<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->tinyInteger('extra')->default(0);
            $table->decimal('price',8,2)->default(0.50);
            $table->timestamps();

            $table->foreign('pizza_id')
            ->references('id')->on('pizzas')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('ingredient_id')
            ->references('id')->on('ingredients')
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
        Schema::dropIfExists('pizza_ingredients');
    }
}
