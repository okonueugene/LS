<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Leave;
use App\Models\Holiday;
use Livewire\Component;
use App\Models\LeaveType;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ApplyLeave extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $date_start;
    public $date_end;
    public $leave_type;
    public $reason;
    public $date_posted;

    public function clearInput()
    {
        $this->date_start = "";
        $this->date_end = "";
        $this->leave_type = "";
        $this->reason = "";
    }

    public function applyLeave()
    {

        $this->validate([
            'date_start' => 'required',
            'date_end' => 'required',
            'reason' => 'required',
            'leave_type' => 'required'
        ]);

        $endDate = strtotime($this->date_end);
        $startDate = strtotime($this->date_start);

        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) {
                $no_remaining_days--;
            }
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) {
                $no_remaining_days--;
            }
        } else {
            if ($the_first_day_of_week == 7) {
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    $no_remaining_days--;
                }
            } else {
                $no_remaining_days -= 2;
            }
        }
        $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }
        $holidays=Holiday::pluck('date');

        foreach ($holidays as $holiday) {
            $time_stamp=strtotime($holiday);

            if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N", $time_stamp) != 6 && date("N", $time_stamp) != 7) {
                $workingDays--;
            }
        }


        Leave::create([
            'employee_id' => Auth::user()->id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'nodays' => $workingDays,
            'leave_type' => $this->leave_type,
            'reason' => $this->reason,
            'status' => 'pending',
            'date_posted' => date('y/m/d'),
            'total' => 0,
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Leave Applied successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }


     public function render()
     {
         $user=User::where('id', Auth::user()->id)->first();
        //  DD(Auth::user()->id);
         $leavetypes = LeaveType::all(); 
         $title="Apply For Leave";
         return view('livewire.admin.apply-leave', compact('user','leavetypes'))
         ->extends('layouts.admin', ['title'=> $title])
         ->section('content');
         
     }
}
