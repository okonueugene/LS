<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class EmployeeProfile extends Component
{
    public function render()
    {
        $title="Profile";
        $user=Employee::where('user_id', Auth::user()->id)->first();
        $departments = Department::orderBy('id','ASC')->get();

        return view('livewire.employee.employee-profile',compact('user','departments'))
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
