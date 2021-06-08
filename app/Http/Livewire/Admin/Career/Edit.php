<?php

namespace App\Http\Livewire\Admin\Career;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.career.edit')->extends('layouts.admin');
    }
}
