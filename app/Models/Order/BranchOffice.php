<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $table = 'branch_offices';

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'branch_office_id','id');
    }
    
}
