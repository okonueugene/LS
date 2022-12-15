<?php

namespace App\Http\Livewire\Manager;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Holiday;
use Livewire\Component;
use App\Models\Employee;

class ManagerDashboard extends Component
{
    public function render()
    {
        $title='Dashboard';

        $employees=User::where('user_type', 'manager')->orWhere('user_type' , 'employee')->get();
        $onleave=Leave::orderBy('id', 'DESC')->where('status' , 'approved')->where('date_end','!=',Carbon::now()->format('Y-m-d'))->where('date_start','>=',Carbon::now()->format('Y-m-d'))->limit(5)->get();
        $mostdays=Employee::orderBy('available_days', 'DESC')->limit(5)->get();
        $leastdays=Employee::orderBy('available_days', 'ASC')->limit(5)->get();
        $taken=Leave::orderBy('id', 'DESC')->where('status','approved')->pluck('nodays')->toArray();
        // DD($taken);
        $upcoming=Holiday::where('date', '>' ,Carbon::now()->format('Y-m-d'))->limit(5)->get();

        return view('livewire.manager.dashboard',compact('employees','onleave','mostdays','leastdays','upcoming','taken'))
        ->extends('layouts.manager',['title'=> $title])
        ->section('content')
        ;
    }
}
