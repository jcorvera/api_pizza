<?php

namespace App\Models\Pizza;

use App\Models\Order\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizzas';

    protected $fillable = ['name','description','price','url_image'];

    public function pizzaIngredients()
    {
        return $this->hasMany(PizzaIngredient::class,'pizza_id','id'); 
    }

    public function pizzaDough()
    {
        return $this->hasMany(PizzaDough::class,'pizza_id','id'); 
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'pizza_id','id');
    }

}
