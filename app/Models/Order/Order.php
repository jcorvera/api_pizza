<?php

namespace App\Models\Order;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'future_order_date',
        'future_orde_hour',
        'user_id',
        'order_type_id',
        'payment_type_id',
        'branch_office_id',
        'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class,'branch_office_id');   
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class,'order_type_id');   
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id');   
    }

    public function deliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::class,'order_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }

}
