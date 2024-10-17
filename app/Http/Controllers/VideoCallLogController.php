<?php

namespace App\Http\Controllers;

use App\Models\VideoCallLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\MailController;


class VideoCallLogController extends Controller
{



    
    /**
     * Display the specified resource.
     */
    public function getUserCallLogs(Request $request)
    {
        //

        $validator = Validator::make($request->route()->parameters(),[
           
            'user_id' =>  ['required' ],
 ]);

       

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save call log ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $user = User::find($request->user_id);
        if($user == null){
            return response()->json(["message"=>"user not found",
            "status"=>false]);

        }


        $call_logs = VideoCallLog::where("doctor_id",$request->user_id)->orWhere("patient_id",$request->user_id)->get();
       

            return response()->json(["message"=>"success",
            "status"=>true,"data"=>$call_logs]);
        //
    }










    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $call_logs = VideoCallLog::orderBy("id","desc")->get();

        return response()->json(["message"=>"success",
        "status"=>true,"data"=>$call_logs]);
    }
















    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            'call_id' =>  ['required' ],
            'patient_id' =>  ['required'],
            'doctor_id' =>  ['required'],
           
           
        ]);

       

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save call log ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $patient = User::find($request->patient_id);
        $doctor = User::find($request->doctor_id);

        if($patient == null || $doctor == null){
            return response()->json(["message"=>"users not found ",
            "status"=>false]);
        }

        $call_logs = VideoCallLog::create($request->all());


        ///SEND MESSAGE
          ///send email to user
          $message = "You have a video call request $patient->fullname ";
          $subject = "MedlifeiLink Appoinment VideoCall";
          $mailController = (new MailController);
          $mailController->notification($patient,$subject,$message);
        ////

        return response()->json(["message"=>"success",
        "status"=>true,"data"=>$call_logs]);



    }

















    /**
     * Display the specified resource.
     */
    public function findById(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            'call_id' =>  ['required' ],
 ]);

       

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save call log ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }


        $call_log = VideoCallLog::where("call_id",$request->call_id)->first();
        if($call_log == null){
            return response()->json(["message"=>"call not found",
            "status"=>false]);

        }

            return response()->json(["message"=>"success",
            "status"=>true,"data"=>$call_log]);
        //
    }







    function check(Request $request, VideoCallLog $videoCallLog){

        $validator = Validator::make($request->all(),[
           
            'id' =>  ['required' ],
            'patient_id' =>  [],
            'doctor_id' =>  [],
           
           
        ]);

       

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save call log ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }
        
       
        $videoCallLog = VideoCallLog::find($request->id);
        $videoCallLog->fill($request->all());
        $videoCallLog->save();

        return response()->json(["message"=>"success",
        "status"=>true,"data"=>$videoCallLog]);




        $user->name = "obi";
        $user->job = "Dev";
        $user->save();

        ///OR

        $user->update(["name"=>"obi","job"=>"Dev"]);
    

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoCallLog $videoCallLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoCallLog $videoCallLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoCallLog $videoCallLog)
    {
        //
    }
}
