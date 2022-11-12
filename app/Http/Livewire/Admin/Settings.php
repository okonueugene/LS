<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        $title = "Settings";

        return view('livewire.admin.settings') ->extends('layouts.admin', ['title'=> $title])
        ->section('content');
    }
}
