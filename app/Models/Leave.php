<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'date_start',
        'date_end',
        'nodays',
        'leave_type_id',
        'reason',
        'status',
        'action_date',
        'remarks',
        'date_posted',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function type()
    {
        return $this->belongsTo(LeaveType::class);
    }


}
