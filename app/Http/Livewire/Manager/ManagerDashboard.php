<?php

namespace App\Http\Livewire\Manager;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;

class ManagerDashboard extends Component
{
    public function render()
    {
        $title='Dashboard';

        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();

        return view('livewire.manager.dashboard',compact('employees'))
        ->extends('layouts.manager',['title'=> $title])
        ->section('content')
        ;
    }
}
