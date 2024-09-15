<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\ProfessionalDetails;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;




use App\Models\Medication;
use App\Models\User;

class DoctorsController extends Controller
{





    //Get all doctors

    public function getDoctors(Request $request){
        
         $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Doctors fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $users = User::where("role","doctor")->orderBy("id","desc")->get();
            return response()->json([
                'message'=> 'Doctors successfully fetched','status'=>true,
              
                "data"=>$users->toArray()
            ]);

    }

















    /*

    Get all patients a doctor registered


    */

    public function getPatients(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           
            'doctor_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Patients fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
            $users = User::where("created_by",$request->doctor_id)->where("role","patient")->orderBy("id","desc")->get();
            return response()->json(
                ['message'=> 'Patients successfully fetched','status'=>true,
              
                "data"=>$users->toArray()
            ]);

        }
    }















    /*

    Get all doctors that is particular to a patient or 
    doctors that a patient has booked appointment with


    */

    public function getPatientsDoctor(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           
            'patient_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"doctors fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {
           /////////////////////////////////////

           $appointments = Appointment::where("patient_id",$request->patient_id)->orderBy("id","desc")->get();

            $doctors = [];

            foreach($appointments as $appointment){
                $doctor = User::find($appointment->doctor_id);
                
                   if(!in_array($doctor,$doctors)){
                    array_push($doctors,$doctor);
                   }

               

             
               

                
            }

            return response()->json([
                'message'=> 'Doctors successfully fetched','status'=>true,
              
                "data"=>$doctors]
            );



           /////////////////////////////////////

        }
    }













   /**
     * Doctore to create a patient.
     */
    public function createUser(Request $request)
    {
        //

        
        // create account



        $validator = Validator::make($request->all(),[

            'doctor_id' => ['required', 'string', 'max:255'],
           
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:255'],
            'username' => ['required', 'string', 'min:3','unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            
           
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Registeration failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $roles =  array("patient");
            if(!in_array($request['role'],$roles)){

                return response()->json([
                    ['message'=> 'Role must be patient,doctor or hospital','status'=>false,
                    "errors"=>'Role must be patient, doctor or hospital',
                    ]
                ]);


            }

            $request['role_id'] = array_search($request['role'],$roles) + 1;


            $request['user_id'] = ($this->uniqueUserId());
            $request['password'] = Hash::make($request['password']);

            // $request['user_type'] =  strtolower($request['user_type']);
            // $request['user_type_int'] =  $this->getUserTypeInt(strtolower($request['user_type']));
            $request['created_by'] =   $request['doctor_id'];

            $user = User::create($request->all());
             $user->created_by = $request['doctor_id'];
            // $user->role_id = array_search($request['role'],$roles) + 1;
             $user->save();

            $user = User::find($user->id);
            $token = $user->createToken('Token')->plainTextToken;
        //    try{
        //     later(300, $this->sendEmailCode($request->email,$request->fullname));
            
        //    }catch(Exception $e){}

            return response()->json(
                ['message'=> 'Registeration successful','status'=>true,
                "token"=> $token,
                "data"=>$user->toArray()
            ]);
        }
    }








    /* Get unique User Id for a user */
    function uniqueUserId($limit = 8)
    {
      return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
    }
    function getUserTypeInt($userType){
        switch($userType){
            case "":
                return 1;
            case "":
                return 2;
            case "":
                return 3;
            case "":
                return 1;
    
        }
    }














    /*

    Activate a Doctor, changing the staus to active, attracts activation fee
     */



    public function activateDoctor(Request $request){

        //
        $validator = Validator::make($request->all(),[
     
           'amount' => ['required', 'integer', 'min:1000'],
           "user_id"=>['required', 'integer', 'min:1'],
           "reference"=>['required', 'string', 'min:1'],
           "gateway"=>['required', 'string', 'min:1'],
          
   ]);
   
       if($validator->fails()){
         
           return response()->json(["message"=>"wallet funds failed",
           "status"=>false,"errors"=>$validator->messages()->all()]);
       }

       $user = User::find($request->user_id);
       if($user == null){

        return response()->json(["message"=>"User not found",
        "status"=>false]);

       }
       //check if transaction ref is valid
       ///pastack checks

       ///////

       //chech if ransaction is already credited in the passed
       $isOldRef = Transaction::where("reference",$request->reference)->get();
       if(count($isOldRef) > 0){
        return response()->json(["message"=>"This transaction has been credited before",
        "status"=>false,
        "data" => $isOldRef->toArray()
    ]);
        }


    ///successful checks
    $old_balance = $user->balance;
    $new_balance = $old_balance + $request->amount;

    $user->status = "active";
    $user -> save();
    ///save transaction

    $transaction = Transaction::create([
        'amount' => $request->amount,
        "user_id"=>$request->user_id,
        "reference"=>$request->reference,
        "gateway"=>$request->gateway,
        "description"=>"registration_fee",
        "credited_to"=>$request->user_id,
        "type"=>"credit",
        "status"=>"pending",
        "title"=>"registration_fee",
        "old_balance" => $old_balance,
        "new_balance" => $new_balance

    ]);

    $message = "Account activation of N$request->amount  successful";

    (new MailController)->notification($user,"wallet funding",$message);


    return response()->json(["message"=>"Transaction successful",
        "status"=>true,
        "data" =>$transaction
    ]);

   }














   /* 

   This is the function that upgrades a Doctors professional details

   */

   function updateProfessioalDetails(Request $request){


     //
     $validator = Validator::make($request->all(),[
     
        "doctor_id" => ['required', 'integer', 'min:1'],
        "specialization"=>['required'],
        "clinic_affiliation"=>['required'],
        "certifications"=>['required','array'],

        "years_of_experience"=>['required'],
        "languages"=>['required',"array"],
        "about"=>['required'],
       
]);

    if($validator->fails()){
      
        return response()->json(["message"=>"Update failed",
        "status"=>false,"errors"=>$validator->messages()->all()]);
    }

    $professionalDetails = ProfessionalDetails::find($request->doctor_id);
    if($professionalDetails == null){
        ProfessionalDetails::create([
            "doctor_id" => $request->doctor_id,
            "specialization" => $request->specialization,
            "clinic_affiliation" => $request->clinic_affiliation,
            "certifications" => serialize($request->certifications),
            "years_of_experience" => $request->years_of_experience,
            "languages" => serialize($request->languages),
            "about" => $request->about,



        ]);

        return response()->json(["message"=>"Successfully created",
        "status"=>true]);
    }else{

        $professionalDetails->update([

            "doctor_id" => $request->doctor_id,
            "specialization" => $request->specialization,
            "clinic_affiliation" => $request->clinic_affiliation,
            "certifications" => serialize($request->certifications),
            "years_of_experience" => $request->years_of_experience,
            "languages" => serialize($request->languages),
            "about" => $request->about,

        ]);

        return response()->json(["message"=>"Successfully updated",
        "status"=>true]);


        





    }





   }















    /* 

   This is the function that gets a Doctors professional details

   */

   function getProfessioalDetails(Request $request){


    //
    $validator = Validator::make($request->all(),[
    
       "doctor_id" => ['required', 'integer', 'min:1'],
       
      
]);

   if($validator->fails()){
     
       return response()->json(["message"=>"get failed",
       "status"=>false,"errors"=>$validator->messages()->all()]);
   }

   $professionalDetails = ProfessionalDetails::find($request->doctor_id);
   $professionalDetails->languages = unserialize( $professionalDetails->languages);
   $professionalDetails->certifications = unserialize( $professionalDetails->certifications);

   return response()->json(["message"=>"Successfully updated",
   "status"=>true, "data"=>$professionalDetails]);





}








}
