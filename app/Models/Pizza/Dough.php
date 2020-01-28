<?php

namespace App\Models\Pizza;

use Illuminate\Database\Eloquent\Model;

class Dough extends Model
{
    protected $table = 'doughs';
    protected $fillable = ['name'];

    public function doughSizes()
    {
        return $this->hasMany(DoughSize::class,'dough_id','id');
    }

    public function pizzaDoughs()
    {
        return $this->hasMany(PizzaDough::class,'dough_id','id'); 
    }
}
