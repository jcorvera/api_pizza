<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('future_order_date')->nullable();
            $table->time('future_order_hour')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_type_id');
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('branch_office_id');
            $table->decimal('amount',8,2)->default(0.00);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('order_type_id')
            ->references('id')->on('order_types')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('payment_type_id')
            ->references('id')->on('payment_types')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('branch_office_id')
            ->references('id')->on('branch_offices')
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
        Schema::dropIfExists('orders');
    }
}
