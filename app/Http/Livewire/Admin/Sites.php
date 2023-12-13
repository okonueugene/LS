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
        $site->name = $this->name ?? $site->name;
        $site->email = $this->email ?? $site->email;
        $site->maintenance_mode = $this->maintenance_mode ?? $site->maintenance_mode;
        $site->copyright = $this->copyright ?? date('Y');
        if ($this->logo) {
            $this->logo->storeAs('public', time() . '.' . $this->logo->extension());
            $site->logo = time() . '.' . $this->logo->extension();


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
