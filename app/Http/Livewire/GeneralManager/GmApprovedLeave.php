<?php

namespace App\Http\Livewire\GeneralManager;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveType;
use App\Models\Department;

class GmApprovedLeave extends Component
{
    public $pages=10;
    public $order='DESC';
    public $search = '';

    public function render()
    {
        $title="Approved Leave Days";

        $searchString=$this->search;

        $leaves =Leave::orderBy('id',$this->order)->where('status', 'approved')->whereHas('user', function ($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(['user' => function($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        }])->paginate($this->pages);
        $departments = Department::orderBy('id','ASC')->get();
        $types=LeaveType::orderBy('id','ASC')->get();
        
        return view('livewire.general-manager.gm-approved-leave',compact('leaves','departments','types'))
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
