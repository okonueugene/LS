<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RejectedLeave extends Component
{
    public function render()
    {
        $title="Declined Leave Days";
        return view('livewire.admin.rejected-leave')
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
