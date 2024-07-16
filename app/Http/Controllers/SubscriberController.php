<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$user_id)
    {
        //

      
            //
    
              //
              $validator = Validator::make($request->route()->parameters(),[
             "user_id"=>['required']
                ]);
        
            if($validator->fails()){
              
                return response()->json(["message"=>"Error fetching subscribers",
                "status"=>false,"errors"=>$validator->messages()->all()]);
            }

        $subscribers = Subscriber::all();

        return response()->json([
            'message'=> 'Subscribers successfully fetched','status'=>true,
          
            "data"=>$subscribers]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            'name' =>  [ ],
            'email' =>  ['required', 'email','unique:subscribers' ],
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save subscriber ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $subscriber = Subscriber::create($request->all());

        return response()->json([
            'message'=> ' successfully added',
            'status'=>true,
           "data"=>$subscriber]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           
           
            'email' =>  ['required' ],
           
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save subscriber ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $subscriber = Subscriber::where("email",$request->email)->first();
        if($subscriber == null){
            return response()->json(["message"=>"subscriber not found ",
            "status"=>false]);

        }
        $subscriber->delete();
        return response()->json(["message"=>"subscriber deleted",
            "status"=>true]);

    }

    public function unSubscribe(Request $request,$email){

        $validator = Validator::make($request->route()->parameters(),[
            "user_id"=>['required']
               ]);
       
           if($validator->fails()){
             
               return response()->json(["message"=>"Error fetching subscribers",
               "status"=>false,"errors"=>$validator->messages()->all()]);
           }

           $subscriber = Subscriber::where("email",$email);
           $subscriber->delete();
           return response()->json(["message"=>"subscriber deleted",
               "status"=>true]);

    }
}
