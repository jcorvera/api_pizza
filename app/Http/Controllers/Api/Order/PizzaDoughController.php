<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\PizzaDoughCollection;
use App\Models\Pizza\PizzaDough;
use Illuminate\Http\Request;

class PizzaDoughController extends Controller
{

    public function show(int $id)
    {
        $pizzaDough = PizzaDough::join('doughs as s','s.id','=','pizza_doughs.dough_id')
        ->select('s.id as dough_id','s.name as name')
        ->where('pizza_doughs.pizza_id',$id)
        ->get();

        return response()->json( new PizzaDoughCollection($pizzaDough),200);

    }
}
