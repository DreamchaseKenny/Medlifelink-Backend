<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Display User Rating .
     */
    public function getRatings(Request $request)
    {
        //
         //
         $validator = Validator::make($request->all(),[
           
            'user_id' =>  ['required' ],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"cant get ratings",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }

        $ratee = User::find($request->user_id);

        if($ratee == null){
            return response()->json(["message"=>"User not found",
            "status"=>false]);

        }


        $ratings =  Rating::where("ratee",$ratee->id)->get();
        $userRatings = [];
       

        foreach($ratings as $rating){
            $rater = User::find($rating->rater);
            $rating['ratee_details']  = $ratee;
            $rating['rater_details']  = $rater;

            array_push($userRatings,$rating);

        }

        

        return response()->json([
            ['message'=> 'Rating successfully fetched','status'=>true,
          
            "data"=>$userRatings]
        ]);
        





    }






















    /**
     * Rate user Doctor.
     */
    public function rateDoctor(Request $request)
    {
        //

         //
         //
         $validator = Validator::make($request->all(),[
           
            'rater' =>  ['required' ],
            'ratee' =>  ['required' ],
            'feedback' => [],
           'overall_satisfaction' => ['required','max:1'],
           'communication'=> ['required','max:1'],
           'knowledge' => ['required','max:1'],
           'bedside_manner' => ['required','max:1'],
           
        ]);

        if($validator->fails()){
          
            return response()->json(["message"=>"cant get ratings",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }else if($request->ratee ==  $request->rater){

            return response()->json(["message"=>"You cant rate yourself",
            "status"=>false,]);

        }

        $ratee = User::find($request->ratee);
        $rater = User::find($request->rater);

        if($ratee == null || $rater == null){
            return response()->json(["message"=>"User not found",
            "status"=>false]);

        }

        $oldRating = Rating::where("ratee",$ratee->id)->where("rater",$rater->id)->first();
        if($oldRating != null){
            return response()->json(["message"=>"Your have rate this user before",
            "status"=>false,"data"=>$oldRating]);

        }

        

       

         


        $rating = Rating::create($request->all());

        $average = ($rating->overall_satisfaction + $rating->communication + $rating->knowledge 
        + $rating->communication + $rating->bedside_manner) / 5;

        $rating->average = $average;

        $rating->save();
        /////Update user rating /////
        $rateeRatings = Rating::where("ratee",$ratee->id)->get();

        $averageRating = 0;
        $totalNumRating = count($rateeRatings);



        foreach ($rateeRatings as $rateeRating) {
            # code...
            $averageRating += $rateeRating->average;
        }

        $averageTotalRating = ($averageRating / $totalNumRating);

        $ratee->rating = $averageTotalRating;
        $ratee->save();



        /////////////////////

        return response()->json(["message"=>"Rating successfull",
            "status"=>false,"data"=>$rating]);



    }











    /**
     * rate a Patient .
     */
    public function ratePatient(Request $request)
    {
        //
        
        //

         //
         //
         $validator = Validator::make($request->all(),[
           
            'rater' =>  ['required' ],
            'ratee' =>  ['required' ],
            'feedback' => [],
           'appointment_cancellation' => ['required','max:1'],
           'no_show'=> ['required','max:1'],
           'waiting_time' => ['required','max:1'],
           'adherence_to_treatment' => ['required','max:1'],
           
        ]);
        

        if($validator->fails()){
          
            return response()->json(["message"=>"cant get ratings",
            "status"=>false,"errors"=>$validator->messages()->all()]);
        }else if($request->ratee ==  $request->rater){

            return response()->json(["message"=>"You cant rate yourself",
            "status"=>false,]);

        }

        $ratee = User::find($request->ratee);
        $rater = User::find($request->rater);

        if($ratee == null || $rater == null){
            return response()->json(["message"=>"User not found",
            "status"=>false]);

        }

        $oldRating = Rating::where("ratee",$ratee->id)->where("rater",$rater->id)->first();
        if($oldRating != null){
            return response()->json(["message"=>"Your have rate this user before",
            "status"=>false,"data"=>$oldRating]);

        }

        

       

         


        $rating = Rating::create($request->all());

        $average = ($rating->appointment_cancellation + $rating->no_show + $rating->waiting_time 
        + $rating->adherence_to_treatment ) / 4;

       

        $rating->average = $average;

        $rating->save();
        /////Update user rating /////
        $rateeRatings = Rating::where("ratee",$ratee->id)->get();

        $averageRating = 0;
        $totalNumRating = count($rateeRatings);



        foreach ($rateeRatings as $rateeRating) {
            # code...
            $averageRating += $rateeRating->average;
        }

        $averageTotalRating = ($averageRating / $totalNumRating);

        $ratee->rating = $averageTotalRating;
        $ratee->save();



        /////////////////////

        return response()->json(["message"=>"Rating successfull",
            "status"=>false,"data"=>$rating]);


    }










   


    /**
     * Update rating .
     */
    public function update(Request $request)
    {
        //
    }


    
}
