<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Companies extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $logo;
    public $company_id;

    public function clearInput(){
        $this->name = "";
        $this->email = "";
    }

    public function addCompany(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|string|unique:companies,company_email'
        ]);

        $logo = $this->logo->store('company-logos', 'public');

        $company = Company::create([
            'company_name' => $this->name,
            'company_email' => $this->email,
            'logo' => $logo
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Company added successfully',
        ]);

        $this->emit('userStore');

        $this->clearInput();

    }

    public function showCompany($id){
        $company = Company::findOrFail($id);
        $this->name = $company->company_name;
        $this->email = $company->email;
        $this->logo = $company->logo;
        $this->company_id = $company->id;
    }

    public function updateCompany($id){
        $company = Company::findOrFail($id);

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


    public function disableCompany($id)
    {

        $company = Company::findOrFail($id);

        if($company->status == true){
            $company->update([
                'status' => false
            ]);
        }
        else{
            $company->update([
                'status' => true
            ]);
        }

        $this->dispatchBrowserEvent('success', [
            'message' => 'Company updated successfully',
        ]);
    }

    public function render()
    {
        $title="Companies";
        $companies = Company::orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.admin.company' , compact('companies'))
        ->extends('layouts.admin',['title'=> $title])
        ->section('content');
    }
}
