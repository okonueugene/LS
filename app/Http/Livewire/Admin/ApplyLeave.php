<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ApplyLeave extends Component
{
    public function render()
    {
        $title="Apply For Leave";
        return view('livewire.admin.apply-leave')
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
