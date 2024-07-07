<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;


class TransactionsController extends Controller
{

    public function fundWallet(Request $request){

        //
        $validator = Validator::make($request->all(),[
     
           'amount' => ['required', 'integer', 'min:1000'],
           "user_id"=>['required', 'integer', 'min:1'],
           "reference"=>['required', 'string', 'min:1'],
           "gateway"=>['required', 'string', 'min:1'],
           "description"=>['required', 'string', 'min:1'],
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

    $user->balance = $user->balance + $request->amount;
    $user -> update();
    ///save transaction

    $transaction = Transaction::create([
        'amount' => $request->amount,
        "user_id"=>$request->user_id,
        "reference"=>$request->reference,
        "gateway"=>$request->gateway,
        "description"=>$request->description,
        "credited_to"=>$request->user_id,
        "type"=>"credit",
        "status"=>"pending",
        "title"=>"wallet_funding",

    ]);

    $message = "Wallet funding of N$request->amount is successful";

    (new MailController)->notification($user,"wallet funding",$message);


    return response()->json(["message"=>"Transaction successful",
        "status"=>true,
        "data" =>$transaction
    ]);

       



   
   
   }

    /**
     * Display a listing of the resource.
     */
    public function userTransactions(Request $request,$user_id)
    {
        //

          //
          $validator = Validator::make($request->route()->parameters(),[
         "user_id"=>['required']
            ]);
    
        if($validator->fails()){
          
            return response()->json(["message"=>"validation error2",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }
 
        $user = User::find($user_id);
        if($user == null){
 
         return response()->json(["message"=>"User not found",
         "status"=>false]);
 
        }

        $transactions = Transaction::where('user_id',$user_id)->get();

        return response()->json(["message"=>"success",
        "status"=>true, "data"=>$transactions]);

        

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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
