<?php

namespace App\Http\Services;

use App\Models\Order\DeliveryAddress;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\Topping;
use App\Http\Resources\Order\InfoOrderResource;
use Illuminate\Support\Facades\DB;

class OrderStoreServices
{
    public function storeOrder(Array $order )
    {
        $order = Order::create([
            'future_order_date' => $order['future_order_date'] ?? null,
            'future_order_hour'  => $order['future_order_hour']?? null,
            'user_id' => auth()->user()->id,
            'order_type_id'  => $order['order_type_id'],
            'payment_type_id'  => $order['payment_type_id'],
            'branch_office_id'  => $order['branch_office_id'],
        ]);
        return $order->getKey();
    }

    public function storeDeliveryAddress(Array $deliveryAddress, int $order_id)
    {
        DeliveryAddress::create([
            'order_id' => $order_id,
            'city' => $deliveryAddress['city'],
            'suburb' => $deliveryAddress['suburb'],
            'street_or_avenue' => $deliveryAddress['street_or_avenue'],
            'house_level_appartment_number' => $deliveryAddress['house_level_appartment_number'],
            'points_reference' => $deliveryAddress['points_reference']
        ]);
    }

    public function storeDetailOrder(Array $orderDetail, int $order_id)
    {
        foreach($orderDetail as $key=> $value) {
            $orderDetailId = OrderDetail::create([
                'order_id' => $order_id,
                'pizza_id' => $value['pizza_id'],
                'dough_size_id' => $value['dough_size_id']
            ]);
            $this->storeToppings((Array) $value['toppings'],$orderDetailId->getKey());
        }
    }

    private  function storeToppings(Array $toppings,int $order_detail_id)
    {
        foreach($toppings as $key=> $value) {
            Topping::create([
                'order_detail_id' => $order_detail_id,
                'pizza_ingredient_id' => $value['pizza_ingredient_id']
            ]);
        }
    }

    public function updateAmount(int $order_id)
    {
        $money = ( $this->calculationCostPizza($order_id) + $this->calculationCostDoughSize($order_id) + $this->calculateCostToopingsExtra($order_id));
        $amount = number_format($money, 2);
        Order::where('id', $order_id)
          ->update(['amount' => $amount]);
    }

    private function calculationCostPizza(int $order_id)
    {
        $orderDetail= OrderDetail::join('pizzas as p','p.id','=','order_details.pizza_id')
        ->select(DB::raw('SUM(p.price) AS price'))
        ->where('order_details.order_id',$order_id)->get();
        return $orderDetail[0]->price;

    }

    private function calculationCostDoughSize(int $order_id)
    {
        $orderDetailDoughSizes= OrderDetail::join('dough_sizes as ds','ds.id','=','order_details.dough_size_id')
        ->select(DB::raw('SUM(ds.price) AS price'))
        ->where('order_details.order_id',$order_id)->get();
        return $orderDetailDoughSizes[0]->price;
    }

    private function calculateCostToopingsExtra(int $order_id)
    {
        $orderDetails = $this->getAllDetailsIds($order_id);

        if (count($orderDetails) > 0) {
            $data = Topping::join('pizza_ingredients as pi', 'pi.id','=','toppings.pizza_ingredient_id')
            ->select(DB::raw('sum(price) as price'))
            ->whereIn('toppings.order_detail_id',$orderDetails)
            ->where('extra',1)
            ->get();

            return $data[0]->price !== null?$data[0]->price:0;
        }

        return 0;
    }

    private function getAllDetailsIds(int $order_id)
    {
        $orderDetails = [];
        $dataOrderDetails = OrderDetail::select('id')->where('order_id',$order_id)->get();
        foreach ($dataOrderDetails as  $value) {
            $orderDetails [] = $value->id;
        }
        return $orderDetails;
    }

    public function infoOrder(int $order_id)
    {
        $infoOrder = Order::join('order_types as ot','ot.id','=','orders.order_type_id')
        ->join('payment_types as pt','pt.id','=','orders.payment_type_id')
        ->join('branch_offices as bo','bo.id','=','orders.branch_office_id')
        ->join('users as u','u.id','=','orders.user_id')
        ->select('future_order_date','future_order_hour','u.email as user_email','ot.name as order_type','bo.name as branch_office','pt.name as payment_type','amount')
        ->where('orders.id',$order_id)
        ->get();
        return new InfoOrderResource($infoOrder);
    }


    public function relationships(int $order_id)
    {
        return [
            'delivery_address' => DeliveryAddress::where('order_id',$order_id)->get(['city', 'suburb', 'street_or_avenue', 'house_level_appartment_number', 'points_reference']),
            'order_details' => OrderDetail::with('toppings')->where('order_id',$order_id)->get(),
        ];
    }

}
