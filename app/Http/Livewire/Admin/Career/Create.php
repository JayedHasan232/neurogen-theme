<?php

namespace App\Http\Livewire\Admin\Career;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.career.create')->extends('layouts.admin');
    }
}
