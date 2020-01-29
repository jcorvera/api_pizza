<?php

namespace App\Http\Resources\Pizza;

use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'pizzas',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'price' => (string )$this->price,
                'url_image' => $this->url_image
            ]
        ];
    }
}
