<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prescribed_by',
        'medicine_name',
        'dosage',
        'status',
        'frequency',
        'note',
        'start_date',
    ];
}
