<?php

namespace App\Http\Livewire\Manager;

use Mail;
use Carbon\Carbon;
use App\Models\User;

use App\Events\Apply;
use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Mail\ApprovedMail;
use App\Mail\DeclinedMail;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ManagerManageLeave extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pages=10;
    public $order='DESC';
    public $search='';

    public $user_id;
    public $user_name;
    public $employee_id;
    public $date_start;
    public $date_end;
    public $nodays;
    public $leave_type_id;
    public $reason;
    public $status;
    public $remarks;
    public $date_posted;
    public $total;


    public function approved()
    {
        $id=Employee::where('user_id', Auth::user()->id)->pluck('department');
        $leave=Leave::orderBy('id', 'DESC')->where('status', 'approved')->where('department_id', implode('', $id))->first();

        Mail::to($leave->user->email)->queue(new ApprovedMail($leave));
    }

    public function declined()
    {
        $id=Employee::where('user_id', Auth::user()->id)->pluck('department');
        $leave=Leave::orderBy('id', 'DESC')->where('status', 'declined')->where('department_id', implode('', $id))->first();

        Mail::to($leave->user->email)->queue(new DeclinedMail($leave));
    }

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
            'action_date' => Carbon::now()->format('Y/m/d'),

        ]);
        if ($this->status == 'approved' && $leave->type->name =='Annual Leave') {
            $totalTaken=Leave::where('user_id', $leave->user_id)->where('status', 'approved')->where('leave_type_id', 1)->sum('nodays');
            Employee::where('user_id', $leave->user_id)->update(['leave_taken' => $totalTaken,'available_days' => round(date('L') == 1 ? (21 / 366) * (date('z') + 1) : (21 / 365) * (date('z') + 1), 2)-$totalTaken]);
        }

        if ($this->status == 'approved') {
            $this->approved();
            $transactionName = Auth::user()->name;
            Apply::dispatch("{$transactionName} Has Approved Your Leave");
        } else {
            $this->declined();
            $transactionName = Auth::user()->name;
            Apply::dispatch("{$transactionName} Has Declined a Your Leave");
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
        $this->user_name = $leave->user->name;
        $this->employee_id = $leave->employee_id;
        $this->date_start = $leave->date_start;
        $this->date_end = $leave->date_end;
        $this->nodays = $leave->nodays;
        $this->leave_type_id = $leave->leave_type_id;
        $this->reason = $leave->reason;
        $this->date_posted = $leave->date_posted;
    }


    public function render()
    {
        $title="Manage Leave Applied";

        $searchString=$this->search;
        $users=User::where('id', Auth::user()->id)->get();
        foreach ($users as $user) {
            $deptemployees=Employee::where(
                'department',
                $user->employee->department
            )->pluck('user_id')
            ->toArray() ;
        }


        $leaves =Leave::orderBy('id', $this->order)->where('status', 'pending')
        ->whereIn('user_id', $deptemployees)
        ->whereHas('user', function ($q) {
            return $q->where('user_type', 'employee');
        })
        ->whereHas('user', function ($query) use ($searchString) {
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(
            ['user' => function ($query) use ($searchString) {
                $query->where('name', 'like', '%'.$searchString.'%');
            }]
        )
        ->paginate($this->pages);

        $departments = Department::orderBy('id', 'ASC')->get();
        $types=LeaveType::orderBy('id', 'ASC')->get();
        return view('livewire.manager.manager-manage-leave', compact('leaves', 'departments', 'types'))
        ->extends('layouts.manager', ['title'=> $title])
        ->section('content')
        ;
    }
}
