<?php

namespace App\Http\Livewire\Employee;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Holiday;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeDashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';

        $onleave = Leave::orderBy('id', 'DESC')->where('status', 'approved')->where('date_start', Carbon::now()->format('Y-m-d'))->where('date_end', '!=', Carbon::now()->format('Y-m-d'))->limit(5)->get();

        $pending = Leave::orderBy('id', 'DESC')->where('status', 'pending')->limit(5)->get();

        $onleave = Leave::orderBy('id', 'DESC')
        ->where('status', 'approved')
        ->where('date_start', '<=', Carbon::now()->format('Y-m-d'))
        ->where('date_end', '>=', Carbon::now()->format('Y-m-d'))
        ->limit(5)
        ->get();

        $taken = Employee::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->pluck('leave_taken')->toArray();

        $remaining = Employee::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->pluck('available_days')->toArray();

        $upcoming = Holiday::orderBy('start_date', 'ASC')->where('start_date', '>', Carbon::now()->format('Y-m-d'))->limit(5)->get();


        return view('livewire.employee.dashboard', compact('onleave', 'upcoming', 'taken', 'remaining', 'pending', 'onleave'))
        ->extends('layouts.employee', ['title' => $title])
        ->section('content')
        ;
    }
}
