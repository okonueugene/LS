<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ApprovedLeave extends Component
{
    public function render()
    {
        $title="Approved Leaves";
        return view('livewire.admin.approved-leave')
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
