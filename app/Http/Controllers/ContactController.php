<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$user_id)
    {
        //
        $validator = Validator::make($request->route()->parameters(),[
            "user_id"=>['required']
               ]);
       
           if($validator->fails()){
             
               return response()->json(["message"=>"Error fetching subscribers",
               "status"=>false,"errors"=>$validator->messages()->all()]);
           }

       $contact = Contact::all();

       return response()->json([
           'message'=> 'Contact successfully fetched','status'=>true,
         
           "data"=>$contact]
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
           
            'name' =>  ['required' ],
            'email' =>  ['required', 'email' ],
            'phone' =>  ['required'  ],
            'message' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save Contact ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $contact = Contact::create($request->all());

        return response()->json([
            'message'=> ' successfully added',
            'status'=>true,
           "data"=>$contact]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        //
        $validator = Validator::make($request->all(),[
           
           
            'contact_id' =>  ['required'],
           
           
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"failed to save subscriber ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $contact = Contact::find("contact_id",$request->contact_id);
        if($contact == null){
            return response()->json(["message"=>"subscriber not found ",
            "status"=>false]);

        }
        $contact->delete();
        return response()->json(["message"=>"contact deleted",
            "status"=>true]);
    }
}
