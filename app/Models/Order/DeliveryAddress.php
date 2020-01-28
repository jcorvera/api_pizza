<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $table = 'delivery_addresses';

    protected $fillable = [
        'order_id',
        'city',
        'suburb',
        'street_or_avenue',
        'house_level_appartment_number',
        'points_reference'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
