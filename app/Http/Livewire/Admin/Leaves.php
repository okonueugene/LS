<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Leaves extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $title="Leave";
        return view('livewire.admin.leave')
        ->extends('layouts.admin',['title'=> $title])
        ->section('content');
    }
}
