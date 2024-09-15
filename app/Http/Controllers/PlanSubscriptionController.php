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
    
        $message = "Wallet funding of N$request->amount is successful";
    
        (new MailController)->notification($user,"wallet funding",$message);

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
