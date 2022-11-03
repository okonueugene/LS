<?php

namespace App\Http\Livewire\GeneralManager;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class GmProfile extends Component
{
    public function render()
    {
        $title="Profile";
        $user=Employee::where('user_id', Auth::user()->id)->first();
        $departments = Department::orderBy('id','ASC')->get();

        return view('livewire.general-manager.gm-profile',compact('user','departments'))
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
