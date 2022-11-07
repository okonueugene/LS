<?php

namespace App\Http\Livewire\Manager;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class ManagerEmployees extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $name;
    public $email;
    public $password;
    public $user_type;
    public $employee_id;
    public $gender;
    public $department;
    public $search = '';



    public function clearInput()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->user_type = "";
        $this->employee_id = "";
        $this->gender = "";
        $this->department = "";
    }
    public function addEmployee()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|string|unique:users,email',
            'password'=>'required|string|min:8',
            'employee_id' =>'required|unique:employees,employee_id',
            'gender'=> 'required',
            'department'=>'required',
            'user_type'=>'required'

        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->user_type,

        ]);

        $emp=User::orderBy('id', 'DESC')->first();

        $employee = Employee::create([
            'employee_id' => $this->employee_id,
            'gender' => $this->gender,
            'department'=> $this->department,
            'leave_taken'=> 0,
            'carry_over' => 0,
            'available_days' => 0,
            'days' => 0,
        ]);
        

     
        Employee::where('employee_id', $this->employee_id)->update(['company_id' => $emp->company_id,'user_id' => $emp->id ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Employee Added successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }


    public function render()
    {
        $title="Employees";
        $departments = Department::orderBy('id','ASC')->get();
        Employee::query()->update(['days' => round(date('L') == 1 ? (21/366)*(date('z') + 1) : (21/365)*(date('z') + 1),2)]);

        $searchString=$this->search;
        $employees = Employee::whereHas('user', function ($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        })
        ->with(['user' => function($query) use ($searchString){
            $query->where('name', 'like', '%'.$searchString.'%');
        }])->paginate(10);
        return view('livewire.manager.manager-employees',compact('employees','departments' ))
        ->extends('layouts.manager', ['title'=> $title])
        ->section('content')
        ;
    }
}
