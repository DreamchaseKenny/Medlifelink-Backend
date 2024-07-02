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
            $appointments = Appointment::where("booked_by",$request->user_id)->orWhere("booked_with",$request->user_id)->orderBy("id","desc")->get();

            $appointmentList = [];

            foreach($appointments as $appointment){
                $booked_with = User::find($appointment->booked_with);
                $booked_by = User::find($appointment->booked_by);

                $appointment["booked_with"] =  $booked_with;
                $appointment["booked_by"] =  $booked_by;
                array_push($appointmentList,$appointment);

                
            }



            



            return response()->json([
                'message'=> 'appointments successfully fetched','status'=>true,
              
                "data"=>$appointmentList]
            );

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

                return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"user not found"]);


            }

            $request['status'] = "pending";




            $appointment = Appointment::create($request->all());
            return response()->json(
                ['message'=> 'Registeration successful','status'=>true,
              
                "data"=>$appointment]
            );

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
    public function update(Request $request)
    {
        //
        $appointment = Appointment::find($request->appointment_id);

        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        if($request->action == "pending"){
            $appointment->status = "pending";

        }
        if($request->action == "approve"){
            $appointment->status = "active";

        }
        if($request->action == "cancel"){
            $appointment->status = "canceled";

        }else if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"invalid action"]);
        }

        $appointment->save();

        if($appointment == null){
            return response()->json(["message"=>"Successfully $request->action",
                "status"=>true]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //

        $appointment = Appointment::find($request->appointment_id);

        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        $appointment->save();

        if($appointment == null){
            return response()->json(["message"=>"Successfully deleted",
                "status"=>true]);
        }

    }
}
