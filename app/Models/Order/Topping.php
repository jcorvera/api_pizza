<?php

namespace App\Models\Order;

use App\Models\Pizza\PizzaIngredient;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table = 'toppings';

    protected $fillable = [
        'order_detail_id',
        'pizza_ingredient_id'
    ];

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class,'order_detail_id');
    }

    public function pizzaIngredient()
    {
        return $this->belongsTo(PizzaIngredient::class,'pizza_ingredient_id');
    }

}
