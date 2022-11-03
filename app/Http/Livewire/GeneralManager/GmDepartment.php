<?php

namespace App\Http\Livewire\GeneralManager;

use Livewire\Component;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Livewire\WithPagination;

class GmDepartment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $description;
    public $search = '';

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
        $title="Departments";
        $departments=Department::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(6);

        return view('livewire.general-manager.gm-department',compact('departments'))
        ->extends('layouts.general', ['title'=> $title])
        ->section('content')
        ;
    }
}
