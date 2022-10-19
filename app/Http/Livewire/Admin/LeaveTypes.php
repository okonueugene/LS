<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LeaveType;

class LeaveTypes extends Component
{
    public $name;
    public $description;
    public $duration;

    public function clearInput()
    {
        $this->name = "";
        $this->description = "";
        $this->duration = "";
    }
    public function addLeaveType()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required'
        ]);

        LeaveType::create([
            'name' => $this->name,
            'description' => $this->description,
            'duration' => $this->duration
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Leave Type Added successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }
    public function deleteLeaveType(LeaveType $leavetype)
    {
        $leavetype->delete();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Leave Type deleted successfully',
        ]);
    }
    public function render()
    {
        $title = "Leave Types";
        $leavetypes = Leavetype::orderBy('id' , 'ASC')->paginate(5);
        return view('livewire.admin.leave-type', compact('leavetypes'))
        ->extends('layouts.admin',['title'=> $title])
        ->section('content');
    }
}
