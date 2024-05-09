<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
         //
         $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"appointments fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
            $medications = Medication::where("booked_by",$request->user_id)->orWhere("booked_with",$request->user_id)->orderBy("id","desc")->get();
            return response()->json([
                ['message'=> 'appointments successfully fetched','status'=>true,
              
                "data"=>$medications->toArray()]
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookAppointment(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
            'booked_by' => ['required', 'max:255'],
            'booked_with' => ['required','max:255'],
            'appointment_time' => ['required','max:255'],
            'title' => ['required','max:255'],
            'description' => ['required','max:255'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Booking falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 
        
        else {
            $booked_by = User::find($request->booked_by);
            $booked_with = User::find($request->booked_with);

            if($booked_by == null ||  $booked_with == null){

                return response()->json(["message"=>"Booking falied ",
                "status"=>false,"errors"=>"user not found"]);


            }




            $appointment = Appointment::create($request->all());
            return response()->json([
                ['message'=> 'Registeration successful','status'=>true,
              
                "data"=>$appointment->toArray()]
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
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
