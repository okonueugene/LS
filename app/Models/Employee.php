<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'gender',
        'department',
        'leave_taken',
        'carry_over',
        'available_days',
    ];

    public function details()
    {
        return $this->belongsTo(User::class);
    }
    
}
