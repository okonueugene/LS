<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class ManagerProfile extends Component
{
    public function render()
    {
        $title="Profile";
        $user=Employee::where('user_id', Auth::user()->id)->first();
        $departments = Department::orderBy('id','ASC')->get();

        return view('livewire.manager.manager-profile',compact('user','departments'))
        ->extends('layouts.manager', ['title'=> $title])
        ->section('content')
        ;
    }
}
