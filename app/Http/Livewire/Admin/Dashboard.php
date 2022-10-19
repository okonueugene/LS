<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $title='Dashboard';
        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();
        return view('livewire.admin.dashboard',compact('employees'))
        ->extends('layouts.admin',['title'=> $title])
        ->section('content')
        ;
    }
}
