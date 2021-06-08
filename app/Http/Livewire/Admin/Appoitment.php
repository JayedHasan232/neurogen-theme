<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Appoitment extends Component
{
    public function render()
    {
        return view('livewire.admin.appoitment')->extends('layouts.admin');
    }
}
