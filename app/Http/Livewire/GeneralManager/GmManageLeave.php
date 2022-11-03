<?php

namespace App\Http\Livewire\GeneralManager;

use App\Models\User;
use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GmManageLeave extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pages=10;
    public $order='DESC';
    public $search='';

    public $user_id;
    public $employee_id;
    public $date_start;
    public $date_end;
    public $nodays;
    public $leave_type;
    public $reason;
    public $status;
    public $remarks;
    public $date_posted;
    public $total;


    public function clearInput()
    {
    
        $this->status = "";
        $this->remarks = "";
    }
    public function updateLeave($id)
    {
        $leave = Leave::findOrFail($id);

        $this->validate([
           
            'remarks' => 'required',
            'status' => 'required',
        ]);

        $leave->update([
            'status' => $this->status,
            'remarks' => $this->remarks,
        ]);
        $old=Employee::where('user_id', $leave->user_id)->pluck('available_days')->toArray();
        
        if($this->status == 'approved' && $leave->leave_type==1){
            Employee::where('user_id', $leave->user_id)->update(['leave_taken' => $leave->nodays,'available_days' =>  implode('',$old)-$leave->nodays]);
        }
        $this->dispatchBrowserEvent('success', [
            'message' => 'Leave Updated successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore'); 

    }
    public function showLeave($id)
    {
        $leave = Leave::where('id', $id)->first();
        $this->user_id = $leave->user_id;
        $this->employee_id = $leave->employee_id;
        $this->date_start = $leave->date_start;
        $this->date_end = $leave->date_end;
        $this->nodays = $leave->nodays;
        $this->leave_type = $leave->leave_type;
        $this->reason = $leave->reason;
        $this->date_posted = $leave->date_posted;     

    }

    public function render()
    {
        $title="Manage Leave Applied";
        
        $searchString=$this->search;

        $managers=User::where('user_type', 'manager')->pluck('id')->toArray();

        $leaves =Leave::orderBy('id', $this->order)->where('status', 'pending')->whereIn('id' ,$managers )->whereHas('user', function ($query) use ($searchString) {
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(['user' => function ($query) use ($searchString) {
            $query->where('name', 'like', '%'.$searchString.'%');
        }])->paginate($this->pages);

        $departments = Department::orderBy('id', 'ASC')->get();
        $types=LeaveType::orderBy('id', 'ASC')->get();
      

        return view('livewire.general-manager.gm-manage-leave', compact('leaves', 'departments', 'types'))
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
