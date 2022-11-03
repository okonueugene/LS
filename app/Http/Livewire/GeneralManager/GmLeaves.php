<?php

namespace App\Http\Livewire\GeneralManager;

use Livewire\Component;

class GmLeaves extends Component
{
    public function render()
    {
        
        return view('livewire.general-manager.gm-leaves')
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
