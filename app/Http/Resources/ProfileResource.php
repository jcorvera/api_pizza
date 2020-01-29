<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProfileResource extends JsonResource
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
            'type' => 'profile',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'created_at' => Carbon::parse($this->created_at)->format('d-m-Y')
            ],
        ];
    }
}
