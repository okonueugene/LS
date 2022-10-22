<?php

namespace App\Http\Livewire\Admin;

use App\Models\Holiday;
use Livewire\Component;
use Livewire\WithPagination;

class Holidays extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $date;

    public function clearInput(){
        $this->name = "";
        $this->date = "";

    }
    public function addHoliday()
    {
        
        $this->validate([
            'name' => 'required',
            'date' => 'required'
        ]);

        Holiday::create([
            'name' => $this->name,
            'date' => $this->date
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Holiday Added successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }
    public function delete(Holiday $holiday)
    {
        $holiday->delete();
    
            $this->dispatchBrowserEvent('success', [
                'message' => 'Holiday deleted successfully',
            ]); 
    }
    public function render()
    {
        $title="Holidays";
        $holidays=Holiday::orderBy('id','ASC')->paginate(6);
        return view('livewire.admin.holiday',compact('holidays'))
        ->extends('layouts.admin',['title'=> $title])
        ->section('content');
    }
}
