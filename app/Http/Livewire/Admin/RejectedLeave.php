<?php

namespace App\Http\Livewire\Admin;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveType;
use App\Models\Department;

class RejectedLeave extends Component
{
    public function render()
    {
        $title="Declined Leave Days";
        $leaves = Leave::where('status', 'pending')->paginate(10);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();

        return view('livewire.admin.rejected-leave',compact('leaves','departments','types'))
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
