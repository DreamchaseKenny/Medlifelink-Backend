<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
       "user_id",
       "plan_id",
        "amount",
       "appointments_booked",
       "total_appointments",
       "num_days",
       "duration"
    ];
}
