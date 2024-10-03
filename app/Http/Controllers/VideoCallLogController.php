<?php

namespace App\Http\Controllers;

use App\Models\VideoCallLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VideoCallLogController extends Controller
{
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

        $call_logs = VideoCallLog::create($request->all());

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
