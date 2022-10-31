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
    public $pages=10;
    public $order='DESC';
    public $search='';

    public function render()
    {
        $title="Manage Leave";

        $searchString=$this->search;

        $leaves =Leave::orderBy('id', $this->order)->where('status', 'pending')->whereHas('user', function ($query) use ($searchString) {
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(['user' => function ($query) use ($searchString) {
            $query->where('name', 'like', '%'.$searchString.'%');
        }])->paginate($this->pages);
        $departments = Department::orderBy('id', 'ASC')->get();
        $types=LeaveType::orderBy('id', 'ASC')->get();
        return view('livewire.admin.manage-leave', compact('leaves', 'departments', 'types'))
         ->extends('layouts.admin', ['title'=> $title])
         ->section('content')
        ;
    }
}
