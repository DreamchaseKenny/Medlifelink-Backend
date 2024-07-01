<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booked_by',
        'booked_with',
        'appointment_time',
        'title',
        'description',
        'status',
    ];
}
