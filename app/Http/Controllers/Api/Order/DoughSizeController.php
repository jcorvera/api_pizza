<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\DoughSizeCollection;
use App\Models\Pizza\DoughSize;
use Illuminate\Http\Request;

class DoughSizeController extends Controller
{
    public function show(int $id)
    {
        $doughsize = DoughSize::join('size_pizzas as sp','sp.id','=','dough_sizes.size_pizza_id')
        ->select('dough_sizes.id as dough_size_id','sp.name as name','dough_sizes.price')
        ->where('dough_sizes.dough_id',$id)
        ->get();
        
        return response()->json(new DoughSizeCollection($doughsize),200);
    }
}
