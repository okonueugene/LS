<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;

class EmployeeDashboard extends Component
{
    public function render()
    {
        $title='Dashboard';

        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();

        return view('livewire.employee.dashboard', compact('employees'))
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
