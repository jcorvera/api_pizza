<?php

namespace App\Models\Pizza;

use App\Models\Order\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class DoughSize extends Model
{
    protected $table = 'dough_sizes';
    
    protected $fillable = [
        'dough_id',
        'size_pizza_id',
        'price'
    ];

    public function dough()
    {
        return $this->belongsTo(Dough::class,'dough_id');
    }

    public function sizePizza()
    {
        return $this->belongsTo(SizePizza::class,'size_pizza_id');
    }

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class,'dough_size_id','id');

    }
}
