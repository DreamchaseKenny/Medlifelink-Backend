<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;




class UserController extends Controller
{

    






    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            'role' => ['required', 'string', 'max:255'],
            
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"User fetch failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $users = User::where("role",$request->role)->orderBy("id","desc")->get();

            

            return response()->json([
                ['message'=> 'User fetch successful','status'=>true,
               
                "data"=>$users->toArray()]
            ]);


        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

        
        // create account



        $validator = Validator::make($request->all(),[
           
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:255'],
            'username' => ['required', 'string', 'min:3','unique:users'],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Registeration failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $roles =  array("patient","doctor","hospital");
            if(!in_array($request['role'],$roles)){

                return response()->json([
                    ['message'=> 'Role must be patient,doctor or hospital','status'=>false,
                    "errors"=>'Role must be patient, doctor or hospital',
                    ]
                ]);


            }

            $request['role_id'] = array_search($request['role'],$roles) + 1;
            if($request['role'] == "doctor"){
                $request['status'] = "pending";
            } 


            $request['user_id'] = ($this->uniqueUserId());
            $request['password'] = Hash::make($request['password']);

            // $request['user_type'] =  strtolower($request['user_type']);
            // $request['user_type_int'] =  $this->getUserTypeInt(strtolower($request['user_type']));

            $user = User::create($request->all());
            $user = User::find($user->id);
            $token = $user->createToken('Token')->plainTextToken;
        //    try{
        //     later(300, $this->sendEmailCode($request->email,$request->fullname));
            
        //    }catch(Exception $e){}

        //SEND mail
        (new MailController)->sendWelcomeMail($user);

        

            return response()->json(
                ['message'=> 'Registeration successful','status'=>true,
                "token"=> $token,
                "data"=>$user]
            );
        }
    }



    public function loginUser(Request $request){

        ///login to account



        $validator = Validator::make($request->all(),[
           
            
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6','max:255'],
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Sigin failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $user = User::where("email",$request->email)->first();
           // return $user;

            if ($user == null) {
                // user doesn't exist

                return response()->json([
                    'message'=> 'user not found','status'=>false,
                    
                ]);

             }
             

             if (!Hash::check($request->password, $user->password)) {
                // password incorrect

                return response()->json([
                    'message'=> 'Incorrect cresidential','status'=>false,
                    
                ]);


            }
            
            $token = $user->createToken('Token')->plainTextToken;

            return response()->json([
                'message'=> 'Login successful','status'=>true,
                "token"=> $token,
                "data"=>$user
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
    public function show(User $user,Request $request)
    {
        //
        $user = User::find($request->id);

        $validator = Validator::make($request->all(),[
           
            
            'user_id' => ['required', 'string', 'max:255'],
            
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Failed to fetch user ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $user = User::where("id",$request->user_id)->first();


            return response()->json([
                ['message'=> ' successful','status'=>true,
               
                "data"=>$user]
            ]);

        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[

            
           
            'phone' => ['required', 'string', 'min:2'],
            'fullname' => ['required', 'string', 'min:2'],
            'country_code' => ['required', 'string', 'min:2'],
            'country' => ['required', 'string', 'min:2'],
            'gender' => ['required', 'string', 'min:2'],
            'address' => ['required', 'string', 'min:2'],
            'dob' => ['required', 'string', 'min:2'],
            "user_id"=>['required', 'integer', 'min:1'],

            'address' => ['required', 'string', 'min:2'],
            'consultation_amount' => [ 'numeric'],
            'specialization' => [ 'string', 'min:2'],
            'photo' => [ 'string', 'min:2'],
            'email' => [ 'string', 'min:2'],

            
            
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"user update failed",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $user = User::where("id",$request->user_id)->first();


          if($user == null){

            return response()->json([
                'message'=> ' user not found','status'=>false,
               
               
            ]);

          }
          $user->update([

            'phone' => $request->phone,
            'fullname' => $request->fullname,
            'country_code' => $request->country_code,
            'country' => $request->country,
            'gender' => $request->gender,
            'address' => $request->address,
            'dob' => $request->dob,

            'photo' => $request->photo,
            'specialization' => $request->specialization,
            'consultation_amount' => $request->consultation_amount,
            'address' => $request->address
            
            
          ]);

            return response()->json([
                'message'=> ' successful','status'=>true,
               
                "data"=>$user->toArray()
            ]);

          
        }

    }

    public function updateProfessionalInfo(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[

            
           
            'address' => ['required', 'string', 'min:2'],
            'consultation_amount' => ['required', 'numeric'],
            'specialization' => ['required', 'string', 'min:2'],
            'photo' => ['required', 'string', 'min:2'],
            "user_id"=>['required', 'integer', 'min:1'],
            
            
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"user update failed",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $user = User::where("id",$request->user_id)->first();


          if($user == null){

            return response()->json([
                'message'=> ' user not found','status'=>false,
               
               
            ]);

          }
          $user->update([

            'photo' => $request->photo,
            'specialization' => $request->specialization,
            'consultation_amount' => $request->consultation_amount,
            'address' => $request->address
            

          ]);

          

            return response()->json([
                'message'=> ' successful','status'=>true,
               
                "data"=>$user->toArray()
            ]);

          
        }

    }


    public function updatePassword(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[

            
           
            'password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6'],
            "user_id"=>['required', 'integer', 'min:1'],
            
            
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"user update failed",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } else {

            $user = User::where("id",$request->user_id)->first();
           


          if($user == null){

            return response()->json([
                'message'=> ' user not found','status'=>false,
               
               
            ]);

          }else if (!Hash::check($request->password, $user->password)){

            return response()->json([
                'message'=> 'Incorrect password','status'=>false,
               
               
            ]);

          }

          $user->update([

            'password' => (Hash::make($request->new_password))
            
            

          ]);

          

            return response()->json([
                'message'=> ' successful','status'=>true,
               
                "data"=>$user->toArray()
            ]);

          
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
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

function forgotPassword(Request $request){

    $validator = Validator::make($request->all(),[

            
           
      
        "email"=>['required', 'email'],
        
        
       
       
    ]);

    if($validator->fails()){
      
        return response()->json(["message"=>"email is required",
        "status"=>false,"errors"=>$validator->messages()->all()]);
    } 

        $user = User::where("email",$request->email)->first();
       


      if($user == null){

        return response()->json([
            'message'=> ' user not found','status'=>false,
           
           
        ]);

      }


      ////send OTP mail
      $otp = rand(100000, 999999);
      (new MailController)->forgetPasswordMail($user, $otp);

      $user->update(["verification_code"=>$otp]);

      return response()->json([
        'message'=> ' otp sent','status'=>true,
       
       
    ]);
}



public function changePassword(Request $request)
{
    //
    $validator = Validator::make($request->all(),[

        
       
        // 'otp' => ['required', 'string', 'min:6'],
        'new_password' => ['required', 'string', 'min:6'],
        "email"=>['required', 'email'],
        
        
       
       
    ]);

    if($validator->fails()){
      
        return response()->json(["message"=>"user update failed",
        "status"=>false,"errors"=>$validator->messages()->all()]);
    } else {

        $user = User::where("email",$request->email)->first();
       


      if($user == null){

        return response()->json([
            'message'=> ' user not found','status'=>false,
           
           
        ]);

      }
      
    //   else if ($user->verification_code != $request->otp){

    //     return response()->json([
    //         'message'=> 'Incorrect password','status'=>false,
           
           
    //     ]);

    //   }

      $user->update([

        'password' => (Hash::make($request->new_password))
        
        

      ]);

      

        return response()->json([
            'message'=> ' successful','status'=>true,
           
            "data"=>$user->toArray()
        ]);

      
    }

}

function confirmOTP(Request $request){

    $validator = Validator::make($request->all(),[

        
       
        'otp' => ['required', 'string', 'min:6'],
        "email"=>['required', 'email'],
      ]);

    if($validator->fails()){
      
        return response()->json(["message"=>"user update failed",
        "status"=>false,"errors"=>$validator->messages()->all()]);
    } 

        $user = User::where("email",$request->email)->first();
       


      if($user == null){

        return response()->json([
            'message'=> ' user not found','status'=>false,
           
           
        ]);

      }
     if ($user->verification_code != $request->otp){

            return response()->json([
                'message'=> 'Incorrect password','status'=>false,
               
               
            ]);
    
          }

          return response()->json([
            'message'=> ' successful','status'=>true,
           
            "data"=>$user->toArray()
        ]);
}




}
