<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Order\InfoOrderResource;
use App\Http\Services\OrderStoreServices;
use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderStoreServices;

    public function __construct()
    {
        $this->orderStoreServices= new OrderStoreServices();
    }

    public function store(StoreOrderRequest $request)
    {
        // try{
        //     DB::beginTransaction();
               $order = $this->orderStoreServices->storeOrder( (array) $request->input('data.attributes') );
               $this->orderStoreServices->storeDeliveryAddress( (array) $request->input('data.relationships.delivery_address'), $order);
               $this->orderStoreServices->storeDetailOrder((array) $request->input('data.relationships.order_details.data'),$order);
               $this->orderStoreServices->updateAmount($order);
        //     DB::commit();
        return response()->json($this->orderDetail($order),201);
        // }catch(\Exception $e){
        //     DB::rollBack();
        //     return response()->json('Internal Error Sever',500);
        // }
    }

    public function orderDetail(int $order_id)
    {
        return [
            'data' => [
                'order_number' => $order_id,
                'type' => 'orders',
                'attributes' => $this->orderStoreServices->infoOrder($order_id),
                'relationships' => $this->orderStoreServices->relationships($order_id),
            ]
        ];
    }

}
