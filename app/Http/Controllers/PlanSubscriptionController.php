<?php

namespace App\Http\Controllers;

use App\Models\PlanSubscription;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;


class PlanSubscriptionController extends Controller
{


    /**
     * GET USERS SUBSCRIBSCRIPTIONS 
     */


    public function userSubscripions(Request $request){
        $validator = Validator::make($request->all(),[

            'user_id' => ['required', ],
           
            
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Subscription failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $user = User::find($request->user_id);

        if($user == null){

            return response()->json(["message"=>"user is null",
            "status"=>false]);

        }


        $subscriptions = PlanSubscription::where("user_id",$request->user_id)->get();




        return   response()->json(["message"=>" success ",
        "status"=>true, "data"=>$subscriptions]);

    }







    /**
     * GET USERS WHO ARE SUBSCRIBERS 
     */
    public function subscribers(Request $request){
        $validator = Validator::make($request->all(),[

            'status' => ['required', ],
           
            
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Subscription failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }
        $status = ["all", "active","completed"];

        if(!in_array($request->status, $status) ){
            return   response()->json(["message"=>" status must be active completed or all ",
            "status"=>false]);

        }

        if($request->status == "all"){

            $subscribers = PlanSubscription::all();
            
        }else{
            $subscribers = PlanSubscription::where("status",$request->status)->get();
        }

         $subscribers1  = [];

        foreach($subscribers as $subscriber){
            $user = User::find($subscriber->user_id);
            $subscriber['user'] = $user;

            array_push($subscribers1,$subscriber);



        }



        return   response()->json(["message"=>" success ",
        "status"=>true, "data"=>$subscribers1]);



        

        

    }







    

    /**
     * User creating / subscribe to a plan .
     */
    public function subscribeToPlan(Request $request)
    {
        //
        
        $validator = Validator::make($request->all(),[

            'user_id' => ['required', 'string', 'max:255'],
            'plan_id' => ['required', 'string', 'min:1'],
            
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"Subscription failed ",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $plan =  Plan::find($request->plan_id);
        $user = User::find($request->user_id);

        if($user == null){

            return response()->json(["message"=>"user not found ",
            "status"=>false]);

        }

        if($plan == null){
            return response()->json(["message"=>"Plan not found ",
            "status"=>false]);
        }

        if(($user->balance < $plan->amount )){
            return response()->json(["message"=>"Insufficient balance",
            "status"=>false]);

        }
        //debit the user
        $old_balance =  $user->balance;
        $new_balance = $user->balance - $plan->amount;
        //save transaction//
        $user->balance = $new_balance;
        $user -> save();
        ///save transaction

        //save subscription
        $planSubscription = PlanSubscription::create([
            "user_id"=>$user->id,
            "plan_id"=>$plan->id,
             "amount"=>$plan->amount,
            "appointments_booked"=>0,
            "total_appointments"=>$plan->total_bookings,
            "num_days"=>0,
            "duration"=>$plan->duration,
        ]);
    
        $transaction = Transaction::create([
            'amount' => $plan->amount,
            "user_id"=>$request->user_id,
            "reference"=>"from balance",
            "gateway"=>"balance",
            "description"=>"wallet_funding",
            "credited_to"=>0,
            "type"=>"debit",
            "status"=>"pending",
            "title"=>"$plan->name Plan  subscription",
            "old_balance" => $old_balance,
            "new_balance" => $new_balance
    
        ]);
    
        $message = "plan Subscrition was successful";
    
        (new MailController)->notification($user,"Plan subscription",$message);

        // $table->float("amount");
        // $table->integer("appointments_booked");
        // $table->integer("total_appointments");
        // $table->integer("num_days");
        // $table->integer("total_num_days");
        // $amounts = [0,2500,30000,50000];
        // $total_appointments = [0,25,30,50];

        return response()->json(["message"=>"Subscription Successfully",
        "status"=>true]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanSubscription $planSubscription)
    {
        //
    }
}
