<?php

namespace App\Http\Livewire\Employee;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveType;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class EmployeeApprovedLeave extends Component
{

    public $pages=10;
    public $order='DESC';
    public $search = '';


    public function render()
    {

        $title="Approved Leaves";
        $searchString=$this->search;

        $leaves =Leave::orderBy('id',$this->order)->where('status', 'approved')->where('user_id', Auth::user()->id)
        ->paginate($this->pages);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();

        return view('livewire.employee.employee-approved-leave',compact('leaves','departments','types'))
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
