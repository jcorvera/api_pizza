<?php

namespace App\Http\Controllers\Api\Order;

use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Costumer\CostumerCollection;

class CostumerController extends Controller
{
    public function mostFrequent()
    {
        $costumers = Order::join('users','users.id','=','orders.user_id')
        ->select('users.id as id',DB::raw('count(orders.user_id) as numero_de_ordenes'), 'users.name as nombre', 'users.email as email')
        ->groupBy('users.id')
        ->orderBy('numero_de_ordenes','DESC')
        ->limit(3)
        ->get();
        
        return response()->json( new CostumerCollection($costumers),200);
    }

    public function mostSpendMoney()
    {
        $costumers = Order::join('users','users.id','=','orders.user_id')
        ->select('users.id as id',DB::raw('sum(orders.amount) as monto'), 'users.name as nombre', 'users.email as email')
        ->groupBy('users.id')
        ->orderBy('monto','DESC')
        ->limit(3)
        ->get();

        return response()->json( new CostumerCollection($costumers),200);
    }
}
