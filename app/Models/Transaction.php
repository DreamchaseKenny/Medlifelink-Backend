<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount' ,
        "user_id",
        "reference",
        "gateway",
        "description",
        "credited_to",
        "type",
        "status",
        "title",
        "bank_name",
        "acc_number",
        "acc_name",
        "old_balance",
        "new_balance"

    ];
}
