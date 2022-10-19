<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class EmployeeDashboard extends Component
{
    public function render()
    {
        $title='Dashboard';
        return view('livewire.employee.dashboard')
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
