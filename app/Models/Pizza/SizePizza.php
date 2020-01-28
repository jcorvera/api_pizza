<?php

namespace App\Models\Pizza;

use Illuminate\Database\Eloquent\Model;

class SizePizza extends Model
{
    protected $table = 'size_pizzas';
    
    protected $fillable = ['name'];

    public function doughSizes()
    {
        return $this->hasMany(DoughSize::class,'size_pizza_id','id'); 
    }
    
}
