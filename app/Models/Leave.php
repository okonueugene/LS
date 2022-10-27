<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date_start',
        'date_end',
        'nodays',
        'leave_type',
        'reason',
        'status',
        'remarks',
        'date_posted',
        'total',
    ];
}
