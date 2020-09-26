<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelica_amount',
        'repay_deadline',
    ];
}
