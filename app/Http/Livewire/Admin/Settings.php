<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;

class Settings extends Component
{
    public $name;
    public $email;
    public $logo;
    public $company_id;

    public function clearInput()
    {
        $this->name = "";
        $this->email = "";
    }
    public function showCompany()
    {
        $company = Company::first()->get();
        $this->name = $company->company_name;
        $this->email = $company->email;
        $this->logo = $company->logo;
        $this->company_id = $company->id;
    }

    public function updateCompany()
    {
        $company = Company::first()->get();

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|string|unique:companies,company_email,'.$company->id
        ]);

        $company->update([
            'company_name' => $this->name,
            'company_email' => $this->email,
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Company updated successfully',
        ]);

        $this->emit('userStore');

        $this->clearInput();
    }

    public function render()
    {
        $title = "Settings";
        $companies=Company::orderBy('id', 'ASC')->first()->get();
        return view('livewire.admin.settings' ,compact('companies')) ->extends('layouts.admin', ['title'=> $title])
        ->section('content');
    }
}
