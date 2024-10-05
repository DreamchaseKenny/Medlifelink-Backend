<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class WebsiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Id is require",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $users = User::find($request->user_id);
        if($users == null){
            return response()->json(["message"=>"user not found",
            "status"=>false]);
        }
        $websiteSettings = WebsiteSettings::find(1);

        return response()->json(["message"=>"succes",
        "status"=>true,"data"=>$websiteSettings]);


    }




   
    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        //
       
        $validator = Validator::make($request->all(),[
           
            'name' =>  ['required' ],
            'phone_number' =>  ['required' ],
            'email' =>  ['required' ],
            'address' =>  ['required' ],
            'about_us' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Fields are require",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }


        $websiteSettings = WebsiteSettings::find(1);
        $websiteSettings->name = $request->name;
        $websiteSettings->phone_number = $request->phone_number;
        $websiteSettings->email = $request->email;
        $websiteSettings->address = $request->address;
        $websiteSettings->about_us = $request->about_us;

        $websiteSettings->save();


        return response()->json(["message"=>"succes",
        "status"=>true,"data"=>$websiteSettings]);



    }



    public function updateAny(Request $request){

        $validator = Validator::make($request->all(),[
            'id' => ['required'],
           
          ]);
    
        if($validator->fails()){
          
            return response()->json(["message"=>"settings not found",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 
    
    
        $websiteSettings = WebsiteSettings::find($request->id);

        if($websiteSettings == null){
      
            return response()->json(["message"=>"settings not found",
            "status"=>false,"errors"=>"settings not found"]);
        } 

        $websiteSettings->fill($request->all());
        $websiteSettings->save();
    
            return response()->json(["message"=>"successfull",
            "status"=>true,"data"=>$websiteSettings]);
    
    
    
     }

    
}
