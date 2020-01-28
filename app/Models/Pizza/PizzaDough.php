<?php

namespace App\Models\Pizza;

use Illuminate\Database\Eloquent\Model;

class PizzaDough extends Model
{
    protected $table = 'pizza_doughs';

    protected $fillable = [
        'pizza_id',
        'dough_id'
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class,'pizza_id');
    }

    public function dough()
    {
        return $this->belongsTo(Dough::class,'dough_id');
    }

}
