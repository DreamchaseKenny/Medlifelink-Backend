<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;



class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"medicaion fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
            $medications = Medication::where("prescribed_by",$request->user_id)->orWhere("user_id",$request->user_id)->orderBy("id","desc")->get();
            return response()->json([
                ['message'=> 'medicaions successfully fetched','status'=>true,
              
                "data"=>$medications->toArray()]
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
            'prescribed_by' =>  ['required' ],
            'medicine_name' =>  ['required' ],
            
            'dosage' =>  ['required' ],
            'frequency' =>  ['required' ],
            'note' =>  ['required' ],
            'start_date' => ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"medicaion prescription failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
            $user_id = User::find($request->user_id);
            $prescribed_by = User::find($request->prescribed_by);

            if($user_id == null ||  $prescribed_by == null){

                return response()->json(["message"=>"medicaion prescription falied ",
                "status"=>false,"errors"=>"user not found"]);


            }

            $medication = Medication::create($request->all());
            return response()->json([
                ['message'=> 'medicaion prescription successful','status'=>true,
              
                "data"=>$medication->toArray()]
            ]);


        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medication $medication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        //
    }
}
