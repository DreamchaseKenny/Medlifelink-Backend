<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected  $fillable = [
             'rater',
            'ratee',

            'feedback',
           'overall_satisfaction',
           'communication',
           'knowledge',
           'bedside_manner',

           'appointment_cancellation',
           'no_show',
           'waiting_time',
           'adherence_to_treatment',
           'average'
            
    ];
}
