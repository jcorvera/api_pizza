<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoughSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dough_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dough_id');
            $table->unsignedBigInteger('size_pizza_id');
            $table->decimal('price',8,2);
            $table->timestamps();

            
            $table->foreign('dough_id')
            ->references('id')->on('doughs')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('size_pizza_id')
            ->references('id')->on('size_pizzas')
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
        Schema::dropIfExists('dough_sizes');
    }
}
