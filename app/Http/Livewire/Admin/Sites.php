<?php

namespace App\Http\Livewire\Admin;

use App\Models\Site;
use Livewire\Component;
use App\Models\SiteSettings;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Sites extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    // $table->id();
    // $table->string('name');
    // $table->string('logo')->nullable();
    // $table->string('email')->nullable();
    // $table->string('copyright')->nullable();
    // $table->string('maintenance_mode')->nullable();
    // $table->timestamps();

    public $name;
    public $email;
    public $logo;
    public $maintenance_mode;
    public $copyright;


    public function updateSiteSettings()
    {
        $this->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|max:1024',
            'maintenance_mode' => 'nullable',
            'copyright' => 'nullable',
        ]);

        $site = SiteSettings::find(1);
        $site->name = $this->name;
        $site->email = $this->email;
        $site->maintenance_mode = $this->maintenance_mode;
        $site->copyright = $this->copyright;
        if ($this->logo) {
            $this->logo->storeAs('public', 'logo.png');
            $site->logo = 'logo.png';
        }
        $site->save();
        return redirect()->back()->with('success', 'Site Settings Updated Successfully');
    }




    public function render()
    {
        $title = "Site Settings";
        $settings = SiteSettings::first();
        return view('livewire.admin.site', compact('title', 'settings'))->extends('layouts.admin', ['title' => $title])->section('content');


    }
}
