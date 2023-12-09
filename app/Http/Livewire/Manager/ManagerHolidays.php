<?php

namespace App\Http\Livewire\Manager;

use App\Events\Apply;
use App\Models\Holiday;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ManagerHolidays extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $summary;
    public $description;
    public $start_date;
    public $end_date;



    public function clearInput()
    {
        $this->summary = null;
        $this->description = null;
        $this->start_date = null;
        $this->end_date = null;
    }
    public function addHoliday()
    {
        $this->validate([
            'summary' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $holiday = Holiday::create([
             'summary' => $this->summary,
             'description' => $this->description,
             'start_date' => $this->start_date,
             'end_date' => $this->end_date,
         ]);
        $this->dispatchBrowserEvent('success', [
            'message' => 'Holiday Added successfully',
        ]);


        $this->clearInput();
        $this->emit('userStore');
        $transactionName = Auth::user()->name;
        Apply::dispatch("{$transactionName} Has Added a Holiday");
    }

    public function render()
    {
        $title = "Holidays";
        $holidays = Holiday::all();

        return view('livewire.manager.manager-holidays', compact('holidays'))
        ->extends('layouts.manager', ['title' => $title])
        ->section('content')
        ;
    }
}
