<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $table = 'order_types';

    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany(Order::class,'order_type_id','id');
    }
    
}
