<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Livewire\WithPagination;

class Departments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $description;

    public function clearInput()
    {
        $this->name = "";
        $this->description = "";
    }
    public function addDepartment()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Department::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Department Added successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }
    public function deleteDepartment(Department $department)
    {
        $department->delete();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Department deleted successfully',
        ]);
    }
    public function render()
    {
        $title="Department";
        
        $departments=Department::orderBy('id', 'ASC')->paginate(6);
        return view('livewire.admin.department', compact('departments'))
        ->extends('layouts.admin', ['title'=> $title])
        ->section('content')
        ;
    }
}
