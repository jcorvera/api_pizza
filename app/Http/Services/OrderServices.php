<?php

namespace App\Http\Services;

use App\Models\Order\DeliveryAddress;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\Topping;
use App\Http\Resources\Order\InfoOrderResource;
use App\Http\Resources\Order\OrderCollection;
use Illuminate\Support\Facades\DB;

class OrderServices
{
    protected const YESNO = ["Yes","No"]; 

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
            'order_details' => $this->orderRelationships($order_id),
        ];
    }

    private function orderRelationships(int $order_id)
    {
        $collection = collect([]);

        $orderDetail = $this->getOrderDetail($order_id);
        
        foreach ($orderDetail as $value) {

            $collectDetail = $this->getToppingsCollect($value->order_detail_id);

            $collection->push([
                "pizza_name" =>  $value->pizza_name,
                "description" => $value->description,
                "url_image" => $value->url_image,
                "price_pizza" => $value->price_pizza,
                "dough_name" => $value->dough_name,
                "size_pizza" => $value->size_pizza,
                "dough_size_pizza_price" => $value->dough_size_pizza_price,
                "price_for_extra_ingredients" => $collectDetail->get('price_ingredients'),
                "total_cost_pizza" =>  number_format( ( $value->price_pizza +  $value->dough_size_pizza_price + $collectDetail->get('price_ingredients')),2 ),
                "toppings" => $collectDetail->get('detail_ingredients'),
            ]);
        }   
        
        return $collection;
    }

    private function getOrderDetail(int $order_id){
        return OrderDetail::join('pizzas as p','p.id','=','order_details.pizza_id')
        ->join('dough_sizes as ds','ds.id','=','order_details.dough_size_id')
        ->join('doughs as s','s.id','=','ds.dough_id')
        ->join('size_pizzas as sp','sp.id','=','ds.size_pizza_id')
        ->select(
            'order_details.id  as order_detail_id',
            'p.name as pizza_name','p.description as description',
            'p.url_image as url_image','p.price as price_pizza',
            's.name as dough_name','sp.name as size_pizza','ds.price as dough_size_pizza_price')->where('order_details.order_id',$order_id)
        ->groupBy('order_details.id')
        ->get();
    }

    private function getToppingsCollect(int $order_detail_id)
    {
        $collectDetail = collect([]);
        $priceIngredientes = 0;

        $toppings = Topping::join('pizza_ingredients as pi','pi.id','toppings.pizza_ingredient_id')
        ->join('ingredients as i','i.id','=','pi.ingredient_id')
        ->select( DB::raw('if(pi.extra = 0,"No","Yes") as extra'),'i.name as name','pi.price as price')
        ->where('toppings.order_detail_id',$order_detail_id)
        ->get();

        foreach ($toppings as $index=> $val) {

            if($val->extra === self::YESNO[0])
            {
                $priceIngredientes += $val->price ;

                $collectDetail->push([
                    "extra" => $val->extra,
                    "name" => $val->name,
                    "price" => $val->price
                ]);

            } else {

                $collectDetail->push([
                    "extra" => $val->extra,
                    "name" => $val->name
                ]);

            }
        }
        return collect(['price_ingredients' => number_format($priceIngredientes,2) ,'detail_ingredients' => $collectDetail]);
    }


    public function allOrders(){
        $orders = Order::join('order_types as ot','ot.id','=','orders.order_type_id')
        ->join('payment_types as pt','pt.id','=','orders.payment_type_id')
        ->join('branch_offices as bo','bo.id','=','orders.branch_office_id')
        ->join('users as u','u.id','=','orders.user_id')
        ->select('future_order_date','future_order_hour','u.email as user_email','ot.name as order_type','bo.name as branch_office','pt.name as payment_type','amount')
        ->where('u.id',auth()->user()->id)
        ->get();  
        return new OrderCollection($orders); 
    }

}
