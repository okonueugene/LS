<?php

namespace App\Http\Livewire\Manager;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveType;
use App\Models\Department;

class ManagerRejectedLeave extends Component
{

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

        $leaves = Leave::orderBy('id',$this->order)->where('status', 'declined')->whereHas('user', function ($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(['user' => function($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        }])->paginate($this->pages);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();

        return view('livewire.manager.manager-rejected-leave', compact('leaves','departments','types'))
        ->extends('layouts.manager', ['title'=> $title])
        ->section('content')
        ;
    }
}
