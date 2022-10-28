<?php

namespace App\Http\Livewire\GeneralManager;

use Livewire\Component;

class GmDashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';
        return view('livewire.general_manager.gm-dashboard')->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
