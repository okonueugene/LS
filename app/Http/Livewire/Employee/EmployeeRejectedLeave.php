<?php

namespace App\Http\Livewire\Employee;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveType;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class EmployeeRejectedLeave extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $pages=10;
    public $order='DESC';
    public $search = '';
    public $remarks;

    public function showRemarks($id)
    {
        $leave = Leave::where('id', $id)->first();
        $this->remarks = $leave->remarks;

    }
  
    public function render()
    {

        $title="Rejected Leave";

        $searchString=$this->search;

        $leaves = Leave::orderBy('id',$this->order)->where('status', 'declined')->where('user_id', Auth::user()->id)->paginate($this->pages);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();

        return view('livewire.employee.employee-rejected-leave', compact('leaves','departments','types'))
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
