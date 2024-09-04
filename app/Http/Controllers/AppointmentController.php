<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailController;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the Appointment.
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
            $appointments = Appointment::where("doctor_id",$request->user_id)->orWhere("patient_id",$request->user_id)->orderBy("id","desc")->get();

            $appointmentList = [];

            foreach($appointments as $appointment){
                $doctor = User::find($appointment->doctor_id);
                $patient = User::find($appointment->patient_id);

                $appointment["doctor"] =  $doctor;
                $appointment["patient"] =  $patient;
                array_push($appointmentList,$appointment);

                
            }



            



            return response()->json([
                'message'=> 'appointments successfully fetched','status'=>true,
              
                "data"=>$appointmentList]
            );

        }
    }























    /**
     * book new Appointment .
     */
    public function bookAppointment(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
            'doctor_id' => ['required', 'max:255'],
            'patient_id' => ['required','max:255'],
            'appointment_time' => ['required','max:255'],
            'appointment_date' => ['required','max:255'],
            'type' => [],
            'link' => ['required'],
            'title' => ['required','max:255'],
            'description' => ['required'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Booking falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 
        
        else {
            $doctor= User::find($request->doctor_id);
            $patient = User::find($request->patient_id);

            if($doctor == null ||  $patient == null){

                return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"user not found"]);


            }

            $request['status'] = "pending";




            $appointment = Appointment::create($request->all());
            $mailController = (new MailController);
            ///send email to booked with (booker)
            $message = "A $patient->fullname has requested for an appointment without";
            $mailController->appointmentMail($appointment,$doctor,$message);

            ///send email to booked with (booker)
            $message = "You have sent an appointment request to $doctor->fullname ";
            $mailController->appointmentMail($appointment,$patient,$message);
            $appointment['doctor'] = $doctor;
            $appointment['patient'] = $patient;

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

        }else
        if($request->action == "approve"){
            $appointment->status = "active";

        }else
        if($request->action == "cancel"){
            $appointment->status = "canceled";

        }else{
            return response()->json(["message"=>"invalid action (action must be pending,approve or cancel)",
                "status"=>false,"errors"=>"invalid action"]);
        }

        $appointment->save();

       
            return response()->json(["message"=>"Successfully $request->action",
                "status"=>true,
                "data"=> $appointment
            ]);
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        $appointment = Appointment::find($request->appointment_id);

        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        $appointment->delete();

       
            return response()->json(["message"=>"Successfully deleted",
                "status"=>true]);

        

    }
}
