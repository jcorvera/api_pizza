<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaDoughsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_doughs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('dough_id');
            $table->timestamps();

            $table->foreign('dough_id')
            ->references('id')->on('doughs')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('pizza_id')
            ->references('id')->on('pizzas')
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
        Schema::dropIfExists('pizza_doughs');
    }
}
