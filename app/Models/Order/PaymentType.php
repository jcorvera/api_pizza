<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_types';
    protected $fillable = ['name'];


    public function orders()
    {
        return $this->hasMany(Order::class,'payment_type_id','id');
    }

}
