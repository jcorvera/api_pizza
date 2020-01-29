<?php

namespace App\Http\Controllers\Api\Pizza;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ingredient\IngredientCollection;
use App\Models\Order\Topping;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
   public function mostPopular()
   {
        $popularIngredients = Topping::join('pizza_ingredients as pi','pi.id','=','toppings.pizza_ingredient_id')
        ->join('ingredients as i','i.id','=','pi.ingredient_id')
        ->select(DB::raw('count(i.id) as frecuencia'),'i.name as nombre', 'i.id')
        ->groupBy('i.id')
        ->orderBy('frecuencia','DESC')
        ->limit(4)
        ->get(); 
           
        return response()->json(new IngredientCollection($popularIngredients),200);
   }
}
