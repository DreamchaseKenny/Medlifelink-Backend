<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        "doctor_id",
           "specialization",
           "clinic_affiliation",
            "certifications",
            "years_of_experience",
            "languages",
           "about",
    ];
}
