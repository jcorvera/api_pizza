<?php

namespace App\Models\Pizza;

use App\Models\Order\Topping;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredient extends Model
{
    protected $table = 'pizza_ingredients';

    protected $fillable = [
        'pizza_id',
        'ingredient_id',
        'extra',
        'price'
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class,'pizza_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class,'ingredient_id');
    }

    public function toppings()
    {
        return $this->hasMany(Topping::class,'pizza_ingredient_id','id');
    }
}
