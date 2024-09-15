<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\ProfessionalDetails;



class AdminController extends Controller
{
    /*
    this function oboards Doctor by admin
    */
   function onboardDoctor(Request $request){
    
    $validator = Validator::make($request->all(),[
           
        
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6','max:255'],
        'username' => ['required', 'string', 'min:3','unique:users'],
        'phone' => ['required', 'string', 'min:2'],
        'fullname' => ['required', 'string', 'min:2'],
        'gender' => ['required', 'string', 'min:2'],
        'dob' => ['required', 'string', 'min:2'],
        'photo' => ['required', 'string', 'min:3'],
        'admin_id' => ['required', 'string', 'min:1'],



       "specialization"=>['required'],
        "clinic_affiliation"=>['required'],
        "certifications"=>['required','array'],

        "years_of_experience"=>['required'],
        "languages"=>['required',"array"],
    ]);

    if($validator->fails()){
      
        return response()->json(["message"=>"Registeration failed ",
        "status"=>false,"errors"=>$validator->messages()->all()]);
    }

    $request['role'] = "doctor";
    $request['role_id'] = 2;
    $request['user_id'] = ($this->uniqueUserId());
    $request['password'] = Hash::make($request['password']);

    $user = User::create($request->all());
    $user->created_by = $request['admin_id'];
    


    ProfessionalDetails::create([
        "doctor_id" =>  $user->id,
        
        "specialization" => $request->specialization,
        "clinic_affiliation" => $request->clinic_affiliation,
        "certifications" => serialize($request->certifications),
        "years_of_experience" => $request->years_of_experience,
        "languages" => serialize($request->languages),
        



    ]);


    return response()->json(["message"=>"Successfully created",
    "status"=>true]);



   }



     /* Get unique User Id for a user */
     function uniqueUserId($limit = 8)
     {
       return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
     }





}
