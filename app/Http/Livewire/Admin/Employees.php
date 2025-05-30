<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class Employees extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pages = 10;
    public $order = 'DESC';

    public $name;
    public $email;
    public $password;
    public $user_type;
    public $employee_id;
    public $gender;
    public $department;
    public $search = '';



    public function export()
    {
        return Excel::download(new EmployeesExport(), 'users.xlsx');
    }

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
            'password' => 'required|string|min:8',
            'employee_id' => 'required|unique:employees,employee_id',
            'gender' => 'required',
            'department' => 'required',
            'user_type' => 'required'

        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->user_type,

        ]);


        $employee = Employee::create([
            'employee_id' => $this->employee_id,
            'gender' => $this->gender,
            'department' => $this->department,
            'leave_taken' => 0,
            'carry_over' => 0,
            'available_days' => 0,
            'days' => 0,

        ]);



        Employee::where('employee_id', $this->employee_id)->update(['company_id' => $emp->company_id,'user_id' => $user->id ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Employee Added successfully',
        ]);

        $this->clearInput();
        $this->emit('userStore');
    }

    public function render()
    {
        $title = "Employee Details";

        $departments = Department::orderBy('id', 'ASC')->get();
        $searchString = $this->search;
        $employees = Employee::orderBy('id', $this->order)->whereHas('user', function ($query) use ($searchString) {
            $query->where('name', 'like', '%' . $searchString . '%');
        })
        ->with(['user' => function ($query) use ($searchString) {
            $query->where('name', 'like', '%' . $searchString . '%');
        }])->paginate($this->pages);
        return view('livewire.admin.employee', compact('employees', 'departments'))
        ->extends('layouts.admin', ['title' => $title])
        ->section('content');
    }
}
