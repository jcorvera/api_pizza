<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\PaymentTypeCollection;
use App\Models\Order\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function show()
    {
        $paymentType = PaymentType::select('id','name')->get();
        return response()->json( new PaymentTypeCollection($paymentType),200);
    }
}
