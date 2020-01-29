<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pizza\BranchOfficeCollection;
use App\Models\Order\BranchOffice;

class BranchOfficeController extends Controller
{
   
    public function show()
    {
        $branchOffice = BranchOffice::get(['id','name','address', 'latitude', 'longitude' ]);
        return response()->json( new BranchOfficeCollection($branchOffice),200);
    }
    
}
