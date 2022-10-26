<?php

namespace App\Http\Livewire\Gm;

use Livewire\Component;

class GmDashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';
        return view('livewire.gm.gm-dashboard')->extends('layouts.manager', ['title'=> $title])
        ->section('content')
        ;
    }
}
