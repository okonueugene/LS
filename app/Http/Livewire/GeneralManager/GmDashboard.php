<?php

namespace App\Http\Livewire\GeneralManager;

use App\Models\User;
use Livewire\Component;

class GmDashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';
        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();

        return view('livewire.general-manager.gm-dashboard', compact('employees'))
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
