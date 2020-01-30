<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Order\OrderDetailCollection;
use App\Http\Services\OrderServices;
use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderServices;

    public function __construct()
    {
        $this->orderServices= new OrderServices();
    }

    public function store(StoreOrderRequest $request)
    {
         try{
             DB::beginTransaction();
               $order = $this->orderServices->storeOrder( (array) $request->input('data.attributes') );
               $this->orderServices->storeDeliveryAddress( (array) $request->input('data.relationships.delivery_address'), $order);
               $this->orderServices->storeDetailOrder((array) $request->input('data.relationships.order_details.data'),$order);
               $this->orderServices->updateAmount($order);
             DB::commit();
        return response()->json($this->orderDetail($order),201);
         }catch(\Exception $e){
             DB::rollBack();
             return response()->json('Internal Error Sever',500);
        }
    }

    public function orderDetail(int $order_id)
    {
        return [
            'data' => [
                'order_number' => $order_id,
                'type' => 'orders',
                'attributes' => $this->orderServices->infoOrder($order_id),
                'relationships' => $this->orderServices->relationships($order_id),
            ]
        ];
    }

    public function userOrderHistory()
    {
        return response()->json($this->orderServices->allOrders(),200);
    }

    public function findOrderDetail(int $order_id)
    {
        $order = Order::select('id')->where([
            ['user_id', auth()->user()->id],
            ['id',$order_id]
        ])->get();

        if(isset($order[0]->id)){
            return response()->json( new OrderDetailCollection($this->orderServices->relationships($order_id)),200);
        }

        return response()->json([],200);

    }

}
