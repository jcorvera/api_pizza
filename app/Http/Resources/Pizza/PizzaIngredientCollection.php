<?php

namespace App\Http\Resources\Pizza;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PizzaIngredientCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'pizza_ingredients',
            'data' => $this->collection,
        ];
    }
}
