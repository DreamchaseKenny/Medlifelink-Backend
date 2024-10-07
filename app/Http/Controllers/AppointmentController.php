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
     *This functions is used to validate inputs in this controller.
     */


    function validateInputs( Array $keyAndRules,Request $request, String $message, ){
        ///This 
       
        $validator = Validator::make($request->all(),$keyAndRules);

        if($validator->fails()){
           
          
            return response()->json(["message"=>$message,
            "status"=>false,"errors"=>$validator->messages()->all()]);
            die;
        } 
    }














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
     * Display a listing of the Appointment.
     */
    public function getAll(Request $request)
    {
        //
         //
         $validator = Validator::make($request->route()->parameters(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"appointments fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
            $appointments = Appointment::all();

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
            'type' => ['required'],
            'link' => ['required'],
            'title' => ['required','max:255'],
            'description' => ['required'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Booking falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 
        
    
            $doctor= User::find($request->doctor_id);
            $patient = User::find($request->patient_id);

            if($doctor == null ||  $patient == null){

                return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"user not found"]);


            }

           

            ////check if patient balance is sufficient
            if($patient->balance < $doctor->consultation_amount ){


                return response()->json(["message"=>"appointment booking failed: reason insufficient balance ",
                "status"=>false,"errors"=>"reason insufficient balance"]);


            }
            
            
            ////////////////////////////////////////
            $request['status'] = "pending";
            $request['price'] = $doctor->consultation_amount;

            ////////////Deduct money from users balance/////////////
            $patient->balance = ($patient->balance -  $doctor->consultation_amount);
            $patient->save();




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










    
    /**
     * update  Appointment .
     */
    public function update(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
           
            'appointment_time' => ['required','max:255'],
            'appointment_date' => ['required','max:255'],
            'type' => ['required'],
            'link' => ['required'],
            'title' => ['required','max:255'],
            'description' => ['required'],
            'appointment_id' => ['required','max:255'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Booking falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 


        
     //
        $appointment = Appointment::find($request->appointment_id);



        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        /////when appointment is cancelled or  cmpleted

        if($appointment->status == "completed" ){
            return response()->json(["message"=>"Appointment is already completed",
                "status"=>false,"errors"=>"invalid action"]);
        }if($appointment->status == "cancelled" ){
            return response()->json(["message"=>"Appointment is already cancelled",
                "status"=>false,"errors"=>"invalid action"]);
        }

        ////////////////////////////////////


        /////// get the doctor and patient invlved
        $doctor= User::find($appointment->doctor_id);
        $patient = User::find($appointment->patient_id);


           





            
                
        $appointment->appointment_time = $request->appointment_time;
        $appointment->appointment_date =  $request->appointment_date;
        $appointment->type =  $request->type;
        $appointment->link =  $request->link;
        $appointment->title =  $request->title;
        $appointment->description =  $request->description;

        $appointment->save();


            
            
            $mailController = (new MailController);
            ///send email to booked with (booker)
            $message = "Your Appointment has been updated ";
            $mailController->appointmentMail($appointment,$doctor,$message);

            ///send email to booked with (booker)
            $message = "Your Appointment has been updated with $doctor->fullname ";
            $mailController->appointmentMail($appointment,$patient,$message);
            $appointment['doctor'] = $doctor;
            $appointment['patient'] = $patient;

            return response()->json(
                ['message'=> 'Registeration successful','status'=>true,
              
                "data"=>$appointment]
            );

        
    }
















     /**
     * update  Appointment .
     */
    public function reschedule(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
           
            'appointment_time' => ['required','max:255'],
            'appointment_date' => ['required','max:255'],
            'type' => ['required'],
            'link' => ['required'],
            'title' => ['required','max:255'],
            'description' => ['required'],
            'appointment_id' => ['required','max:255'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Booking falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 


        
     //
        $appointment = Appointment::find($request->appointment_id);



        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        /////when appointment is cancelled or  cmpleted

        if($appointment->status == "completed" ){
            return response()->json(["message"=>"Appointment is already completed",
                "status"=>false,"errors"=>"invalid action"]);
        }if($appointment->status == "cancelled" ){
            return response()->json(["message"=>"Appointment is already cancelled",
                "status"=>false,"errors"=>"invalid action"]);
        }

        ////////////////////////////////////


        /////// get the doctor and patient invlved
        $doctor= User::find($appointment->doctor_id);
        $patient = User::find($appointment->patient_id);


           





            
                
        $appointment->appointment_time = $request->appointment_time;
        $appointment->appointment_date =  $request->appointment_date;
        $appointment->type =  $request->type;
        $appointment->link =  $request->link;
        $appointment->title =  $request->title;
        $appointment->description =  $request->description;

        $appointment->save();


            
            
            $mailController = (new MailController);
            ///send email to booked with (booker)
            $message = "Your Appointment has been updated ";
            $mailController->appointmentMail($appointment,$doctor,$message);

            ///send email to booked with (booker)
            $message = "Your Appointment has been updated with $doctor->fullname ";
            $mailController->appointmentMail($appointment,$patient,$message);
            $appointment['doctor'] = $doctor;
            $appointment['patient'] = $patient;

            return response()->json(
                ['message'=> 'Registeration successful','status'=>true,
              
                "data"=>$appointment]
            );

        
    }




















   

   

    /**
     * Update Appintment status . (approve,completed)
     */
    public function updateStatus(Request $request)
    {


            $validator = Validator::make($request->all(),[
           
            
                'appointment_id' => ['required', 'max:255'],
                'action' => ['required', 'max:255'],
            
            ]);
    
            if($validator->fails()){
              
                return response()->json(["message"=>"update falied  ",
                "status"=>false,"errors"=>$validator->messages()->all()]);
            } 
        //
        $appointment = Appointment::find($request->appointment_id);



        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        /////when appointment is cancelled or  cmpleted

        if($appointment->status == "completed" ){
            return response()->json(["message"=>"Appointment is already completed",
                "status"=>false,"errors"=>"invalid action"]);
        }if($appointment->status == "cancelled" ){
            return response()->json(["message"=>"Appointment is already cancelled",
                "status"=>false,"errors"=>"invalid action"]);
        }

        ////////////////////////////////////


        /////// get the doctor and patient invlved
        $doctor= User::find($appointment->doctor_id);
        $patient = User::find($appointment->patient_id);



        ////

       
        if($request->action == "approve"){
            $appointment->status = "active";

        }else
        if($request->action == "completed"){
            if($appointment->status == "pending"){
                return response()->json(["message"=>"Appointment is has not been approved",
                    "status"=>false,"errors"=>"invalid action"]);
            }
            $appointment->status = "completed";

             ///credit  doctor/////
        $doctor_new_balance = $doctor->balance + $appointment->price;
        $doctor->balance = $doctor_new_balance;
        $doctor->save();

        }
         else{
            return response()->json(["message"=>"invalid action (action must be approve or completed  )",
                "status"=>false,"errors"=>"invalid action"]);
        }

       

        $appointment->save();

        
        $appointment['doctor'] = $doctor;
        $appointment['patient'] = $patient;

        ////send email ////


        //// end f send email////

       
            return response()->json(["message"=>"Successfully $request->action",
                "status"=>true,
                "data"=> $appointment
            ]);
        

    }















     /**
     * cancel Appintment 
     */
    public function cancel(Request $request)
    {


            $validator = Validator::make($request->all(),[
           
            
                'appointment_id' => ['required', 'max:255'],
                
            
            ]);
    
            if($validator->fails()){
              
                return response()->json(["message"=>"update falied  ",
                "status"=>false,"errors"=>$validator->messages()->all()]);
            } 
        //
        $appointment = Appointment::find($request->appointment_id);

        
        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

       
         /////when appointment is cancelled or  cmpleted

         if($appointment->status == "completed" ){
            return response()->json(["message"=>"Appointment is already completed",
                "status"=>false,"errors"=>"invalid action"]);
        }else if($appointment->status == "cancelled"){
            return response()->json(["message"=>"Appointment is already cancelled",
                "status"=>false,"errors"=>"invalid action"]);
        }

        ////////////////////////////////////
        
        $doctor= User::find($appointment->doctor_id);
        $patient = User::find($appointment->patient_id);

       

        ///refund patient/////
        // $doctor_new_balance = $doctor->balance - $appointment->price;
        // $doctor->balance = $doctor_new_balance;
        // $doctor->save();


        $patient_new_balance = $patient->balance + $appointment->price;
        $patient->balance = $patient_new_balance;
        $patient->save();

      

        






        //////end of refund patient////
        $appointment->status = "cancelled";

        $appointment->save();

        $appointment['doctor'] = $doctor;
        $appointment['patient'] = $patient;


         ////send email ////


        //// end f send email////


       
            return response()->json(["message"=>"Successfully $request->action",
                "status"=>true,
                "data"=> $appointment
            ]);
        

    }











    /**
     * Delete appointment.
     */
    public function destroy(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
            'appointment_id' => ['required', 'max:255'],
            
        
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"delete falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 

        $appointment = Appointment::find($request->appointment_id);

        if($appointment == null){
            return response()->json(["message"=>"appointment not found",
                "status"=>false,"errors"=>"appointment not found"]);
        }

        $appointment->delete();

       
            return response()->json(["message"=>"Successfully deleted",
                "status"=>true]);

        

    }




      /**
     * get active Appointments .
     */
    public function activeAppointments(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
            'user_id' => ['required', 'max:255'],
            
        
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"fetch falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 

        $appointments = Appointment::where(function ($query,)use ($request) {
            $query->where('doctor_id', '=', $request->user_id)
                  ->orWhere('patient_id', '=', $request->user_id);
        })->where(function ($query) {
            $query->where('status', '=', "active");
        })->orderBy("id","desc")->get();


        

        $appointmentList = [];

        foreach($appointments as $appointment){
            $doctor = User::find($appointment->doctor_id);
            $patient = User::find($appointment->patient_id);

            $appointment["doctor"] =  $doctor;
            $appointment["patient"] =  $patient;
            array_push($appointmentList,$appointment);

            
        }


             
        
        
        


       
            return response()->json(["message"=>"Successfully ",
                "status"=>true,"data"=>$appointmentList]);

        

    }










    
      /**
     * get recent Appointments .
     */
    public function recentAppointments(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            
            'user_id' => ['required', 'max:255'],
            
        
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"delete falied  ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 

        $appointments = Appointment::where(function ($query)use ($request) {
            $query->where('doctor_id', '=', $request->user_id)
                  ->orWhere('patient_id', '=', $request->user_id);
        })->where(function ($query) {
            $query->where('status', '!=', "active");
        })->orderBy("id","desc")->get();


        

        $appointmentList = [];

        foreach($appointments as $appointment){
            $doctor = User::find($appointment->doctor_id);
            $patient = User::find($appointment->patient_id);

            $appointment["doctor"] =  $doctor;
            $appointment["patient"] =  $patient;
            array_push($appointmentList,$appointment);

            
        }


             
        
        
        


       
            return response()->json(["message"=>"Successfully ",
                "status"=>true,"data"=>$appointmentList]);

        

    }
}
