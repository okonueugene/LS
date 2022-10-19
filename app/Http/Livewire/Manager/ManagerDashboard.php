<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;

class ManagerDashboard extends Component
{
    public function render()
    {
        $title='Dashboard';
        return view('livewire.manager.dashboard')
        ->extends('layouts.manager',['title'=> $title])
        ->section('content')
        ;
    }
}
