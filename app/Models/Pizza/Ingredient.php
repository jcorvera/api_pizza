<?php

namespace App\Models\Pizza;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = ['name'];

    public function pizzaIngredients()
    {
        return $this->hasMany(PizzaIngredient::class,'ingredient_id','id');
    }

}
