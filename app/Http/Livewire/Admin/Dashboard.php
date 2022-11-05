<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use Livewire\Component;
use App\Models\Employee;

class Dashboard extends Component
{
    public function render()
    {
        $title='Dashboard';
        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();
        $onleave=Leave::orderBy('id', 'DESC')->where('status' , 'approved')->where('date_start', Carbon::now()->format('Y-m-d'))->where('date_end','!=', Carbon::now()->format('Y-m-d'))->limit(5)->get();
        $mostdays=Employee::orderBy('available_days', 'DESC')->limit(5)->get();
        $leastdays=Employee::orderBy('available_days', 'ASC')->limit(5)->get();
        return view('livewire.admin.dashboard',compact('employees','onleave','mostdays','leastdays'))
        ->extends('layouts.admin',['title'=> $title])
        ->section('content')
        ;
    }
}
