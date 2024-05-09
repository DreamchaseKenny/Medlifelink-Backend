<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




use App\Models\Medication;
use App\Models\User;

class DoctorsController extends Controller
{
    //

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
            return response()->json([
                ['message'=> 'Patients successfully fetched','status'=>true,
              
                "data"=>$users->toArray()]
            ]);

        }
    }



   /**
     * Show the form for creating a new resource.
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
            
            'password' => ['required', 'string', 'max:255'],
           
           
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

            return response()->json([
                ['message'=> 'Registeration successful','status'=>true,
                "token"=> $token,
                "data"=>$user->toArray()]
            ]);
        }
    }
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



}
