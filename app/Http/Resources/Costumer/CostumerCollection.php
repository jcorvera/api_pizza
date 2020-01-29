<?php

namespace App\Http\Resources\Costumer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CostumerCollection extends ResourceCollection
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
            'type' => 'costumers',
            'data' => $this->collection
        ];
    }
}
