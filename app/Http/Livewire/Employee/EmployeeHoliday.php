<?php

namespace App\Http\Livewire\Employee;

use App\Models\Holiday;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeHoliday extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $date;
    public $search = '';

    public function render()
    {
        $title="Holidays";
        $holidays=Holiday::orderBy('id','ASC')->where('name', 'like', '%'.$this->search.'%')->paginate(6);

        return view('livewire.employee.employee-holiday',compact('holidays'))
        ->extends('layouts.employee',['title'=> $title])
        ->section('content')
        ;
    }
}
