<?php

namespace App\Http\Controllers\Api\Pizza;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pizza\PizzaCollection;
use App\Http\Resources\Pizza\PizzaIngredientCollection;
use App\Http\Resources\Pizza\PizzaResource;
use App\Models\Pizza\Pizza;
use App\Models\Pizza\PizzaIngredient;
use Illuminate\Support\Facades\DB;

class PizzaControllers extends Controller
{

   public function show()
   {
        $pizzas = Pizza::select('id','name','description','price','url_image')->paginate(15);
        return response()->json( new  PizzaCollection($pizzas) ,200);
   }

   public function find(int $id)
   {
        $pizza = Pizza::find($id,['id','name','description','price','url_image']);
        return response()->json(new PizzaResource($pizza),200);
   }

   public function preEstablishedIngredients(int $id)
   {
    $pizzaIngredients = PizzaIngredient::join('ingredients','ingredients.id','=','pizza_ingredients.ingredient_id')
    ->select('pizza_ingredients.id as id','ingredients.name as name')
    ->where([
        ['pizza_ingredients.pizza_id',$id],
        ['pizza_ingredients.extra',0],
    ])->get();

    return response()->json(new PizzaIngredientCollection($pizzaIngredients),200);
   }

   public function ingredientsAvailableToMake(int $id)
   {
        $pizzaIngredients = PizzaIngredient::join('ingredients','ingredients.id','=','pizza_ingredients.ingredient_id')
        ->select('pizza_ingredients.id as id',DB::raw('if(pizza_ingredients.extra = 0,"No","Yes") as extra'),'ingredients.name as name', 'pizza_ingredients.price as price')
        ->where([
            ['pizza_ingredients.pizza_id',$id],
            ['pizza_ingredients.extra',1],
        ])->get();
        
        return response()->json(new PizzaIngredientCollection($pizzaIngredients),200);
   }

}
