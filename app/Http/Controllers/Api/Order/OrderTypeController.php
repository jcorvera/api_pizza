<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderTypeCollection;
use App\Models\Order\OrderType;

class OrderTypeController extends Controller
{
    public function show()
    {
        $orderType = OrderType::select('id','name')->get();
        return response()->json(new OrderTypeCollection($orderType),200);
    }
}
