<?php

namespace App\Http\Resources\Pizza;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BranchOfficeCollection extends ResourceCollection
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
            'type' => 'branch_offices',
            'data' => $this->collection,
        ];
    }
}
