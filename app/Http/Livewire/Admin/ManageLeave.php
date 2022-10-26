<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ManageLeave extends Component
{
    public function render()
    {

        $title="Manage Leave";

        return view('livewire.admin.manage-leave')
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
