<?php

namespace App\Http\Livewire\Admin;

use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;

class ManageLeave extends Component
{
    public function render()
    {
        $title="Manage Leave";
        // $id= Leave::where('status', 'pending')->pluck('id')->toArray();
        $leaves = Leave::where('status', 'pending')->get();
        $employees = Employee::whereIn('id' , $leaves->pluck('id')->toArray())->get();
        return view('livewire.admin.manage-leave', compact('leaves'))
         ->extends('layouts.admin', ['title'=> $title])
         ->section('content')
        ;
    }
}
