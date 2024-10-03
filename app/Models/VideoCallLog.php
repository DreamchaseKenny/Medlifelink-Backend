<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        
        "call_id",
        "patient_id",
        "doctor_id"
    ];
}
