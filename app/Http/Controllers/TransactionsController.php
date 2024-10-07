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

    /*
    show all transactions
    */

    public function getAllTransactions(Request $request){


          $validator = Validator::make($request->route()->parameters(),[
            "user_id"=>['required']
               ]);
       
           if($validator->fails()){
             
               return response()->json(["message"=>"validation error2",
               "status"=>false,"errors"=>$validator->messages()->all()]);
           }
    
           $user = User::find($request->user_id);
           if($user == null){
    
            return response()->json(["message"=>"User not found",
            "status"=>false]);
    
           }
   
           $transactions = Transaction::all();
           $transactions1 =[];
   
           foreach($transactions as $transaction){
               $transaction['username'] = $user->username;
               array_push($transactions1,$transaction);
           }
   
           return response()->json(["message"=>"success",
           "status"=>true, "data"=>$transactions1]);

    }

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
    $old_balance = $user->balance;
    $new_balance = $old_balance + $request->amount;

    $user->balance = $user->balance + $request->amount;
    $user -> save();
    ///save transaction

    $transaction = Transaction::create([
        'amount' => $request->amount,
        "user_id"=>$request->user_id,
        "reference"=>$request->reference,
        "gateway"=>$request->gateway,
        "description"=>"wallet_funding",
        "credited_to"=>$request->user_id,
        "type"=>"credit",
        "status"=>"pending",
        "title"=>$request->description,
        "old_balance" => $old_balance,
        "new_balance" => $new_balance

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
        $transactions1 =[];

        foreach($transactions as $transaction){
            $transaction['username'] = $user->username;
            array_push($transactions1,$transaction);
        }

        return response()->json(["message"=>"success",
        "status"=>true, "data"=>$transactions1]);

        

    }
























    /**
     * Show the form for creating a new resource.
     */
    public function withdrawal(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[

        
       
            'amount' => ['required',"numeric"],
            "user_id"=>['required'],
            "acc_number"=>['required'],
            "acc_name"=>['required'],
            "bank_name"=>['required'],
          ]);
    
        if($validator->fails()){
          
            return response()->json(["message"=>"withdrawal failed",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        } 
    
            $user = User::find($request->user_id);
           
    
    
          if($user == null){
    
            return response()->json([
                'message'=> ' user not found','status'=>false,]);
    
          }else if($user->role_id <2){

            return response()->json([
                'message'=> ' Only Doctors can request withdrawal','status'=>false,]);
            

          }


          /////////////VALIDATION COMPLETE////
          if($user->balance < $request->amount){
            return response()->json([
                'message'=> 'Insufficient fund','status'=>false,
               ]);

          }
          ///debit account
          $old_balance = $user->balance;

          $user->balance = ($user->balance - $request->amount);
          $user->save();

          ///save transaction///

          $transaction = Transaction::create([
            'amount' => $request->amount,
            "user_id"=>$request->user_id,
            "reference"=>"none",
            "gateway"=>"bank transfer",
            "description"=>"withdrawal",
            "credited_to"=>$request->user_id,
            "type"=>"debit",
            "status"=>"pending",
            "title"=>"withdrawal",
            "old_balance"=>$old_balance,
            "new_balance" => ($old_balance - $request->amount)
    
        ]);

        return response()->json(["message"=>"success",
        "status"=>true, "data"=>$transaction]);



    }































    /**
     * update a transaction.
     */
    public function approveTransaction(Request $request)
    {

         //
         $validator = Validator::make($request->all(),[
     
            'transaction_id' => ['required',],
            "user_id"=>['required', 'integer', 'min:1'],
            "transaction_description"=>['required'],
           
    ]);
    
        if($validator->fails()){
          
            return response()->json(["message"=>"transaction not found",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }
 
        $user = User::find($request->user_id);
        $transaction = Transaction::find($request->transaction_id);
        if($user == null){
 
         return response()->json(["message"=>"User not found",
         "status"=>false]);
 
        }

        if($transaction == null){
 
            return response()->json(["message"=>"transaction not found",
            "status"=>false]);
    
           }
           if($transaction->user_id != $user->id){
 
            return response()->json(["message"=>"transaction not found",
            "status"=>false]);
    
           }
           if($transaction->status != "pending"){
 
            return response()->json(["message"=>"transaction is not pending",
            "status"=>false]);
    
           }
           ///Satisfied

           if($transaction->description == "withdrawal"){
            $transaction->status = "approved";
            

           }else if("wallet_funding"){
            $transaction->status = "approved";

           }

           $transaction->save();

           return response()->json(["message"=>"success",
           "status"=>true, "data"=>$transaction]);

        
    }


























    public function declineTransaction(Request $request)
    {
          //
          $validator = Validator::make($request->all(),[
     
            'transaction_id' => ['required',],
            "user_id"=>['required', 'integer', 'min:1'],
            "transaction_description"=>['required'],
           
    ]);
    
        if($validator->fails()){
          
            return response()->json(["message"=>"wallet funds failed",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }
 
        $user = User::find($request->user_id);
        $transaction = Transaction::find($request->transaction_id);
        if($user == null){
 
         return response()->json(["message"=>"User not found",
         "status"=>false]);
 
        }

        if($transaction == null){
 
            return response()->json(["message"=>"transaction not found",
            "status"=>false]);
    
           }
           if($transaction->user_id != $user->id){
 
            return response()->json(["message"=>"transaction not found",
            "status"=>false]);
    
           }
           if($transaction->status != "pending"){
 
            return response()->json(["message"=>"transaction is not pending",
            "status"=>false]);
    
           }

           if($transaction->description == "withdrawal"){
            $transaction->status = "declined";
            $old_balance = $user->balance;
            $transaction->new_balance =  ($old_balance + $transaction->amount);
            $user->balance = ($user->balance + $transaction->amount);
            

           }else if("wallet_funding"){
            $transaction->status = "declined";

           }

           $transaction->save();
           $user -> save();

           return response()->json(["message"=>"success",
           "status"=>true, "data"=>$transaction]);


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
