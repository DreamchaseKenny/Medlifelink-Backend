<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;

class PlanController extends Controller
{
    //

    function index(Request $request){
        

        $plans = Plan::all();
        return response()->json(["message"=>"successfull",
            "status"=>true,"data"=>$plans]);

        
    }
}
