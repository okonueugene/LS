<?php

namespace App\Http\Livewire\Admin;

use Mail;
use App\Mail\ApprovedMail;
use App\Mail\DeclinedMail;

use Carbon\Carbon;
use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use Livewire\WithPagination;
use App\Exports\ManageLeavesExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ManageLeave extends Component
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
    public $leave_type_id;
    public $reason;
    public $status;
    public $remarks;
    public $date_posted;
    public $total;


    public function approved()
    {
        $leave=Leave::orderBy('id', 'DESC')->where('status', 'approved')->first();

        Mail::to('versionaskari19@gmail.com')->queue(new ApprovedMail($leave));
    }

    public function declined()
    {
        $leave=Leave::orderBy('id', 'DESC')->where('status', 'declined')->first();

        Mail::to('versionaskari19@gmail.com')->queue(new DeclinedMail($leave));
    }

    public function export()
    {
        return Excel::download(new ManageLeavesExport(), 'users.xlsx');
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
           $old=Employee::where('user_id', $leave->user_id)->pluck('days')->toArray();

           if ($this->status == 'approved' && $leave->leave_type_id==1) {
               Employee::where('user_id', $leave->user_id)->update(['leave_taken' => $leave->nodays,'available_days' =>  implode('', $old)-$leave->nodays]);
           }
           if ($this->status == 'approved') {
               $this->approved();
           } else {
               $this->declined();
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
           $this->leave_type_id = $leave->leave_type_id;
           $this->reason = $leave->reason;
           $this->date_posted = $leave->date_posted;
       }
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

           return view('livewire.admin.manage-leave', compact('leaves'))
            ->extends('layouts.admin', ['title'=> $title])
            ->section('content')
           ;
       }
}
