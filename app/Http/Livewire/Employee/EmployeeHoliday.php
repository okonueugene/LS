<?php

namespace App\Http\Livewire\Employee;

use App\Models\Holiday;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeHoliday extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $summary;
    public $description;
    public $start_date;
    public $end_date;

    public function render()
    {
        $title = "Holidays";
        $holidays = Holiday::all();

        return view('livewire.employee.employee-holiday', compact('holidays'))
        ->extends('layouts.employee', ['title' => $title])
        ->section('content')
        ;
    }
}
