<?php

namespace App\Http\Livewire\Admin;

use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use Livewire\WithPagination;


class ManageLeave extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $title="Manage Leave";
        $leaves = Leave::where('status', 'pending')->paginate(10);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();
        return view('livewire.admin.manage-leave', compact('leaves','departments','types'))
         ->extends('layouts.admin', ['title'=> $title])
         ->section('content')
        ;
    }
}
