<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Leaves extends Component
{
    public function render()
    {
        $title="Leave";
        return view('livewire.admin.leave')
        ->extends('layouts.admin',['title'=> $title])
        ->section('content');
    }
}
