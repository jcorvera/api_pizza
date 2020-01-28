<?php

namespace App\Models\Order;

use App\Models\Pizza\DoughSize;
use App\Models\Pizza\Pizza;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    
    protected $fillable = [
        'order_id',
        'pizza_id',
        'dough_size_id'
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class,'pizza_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function doughSize()
    {
        return $this->belongsTo(DoughSize::class,'dough_size_id');

    }

    public function toppings()
    {
        return $this->hasMany(Topping::class,'order_detail_id','id'); 
    }
}
