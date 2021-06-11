<?php

namespace App\Http\Livewire\App\Career;

use Livewire\Component;
use App\Models\Career;

class Index extends Component
{
    public $careers;

    public function mount()
    {
        $this->careers = Career::where('privacy', 1)->get();
    }
    
    public function render()
    {
        return view('livewire.app.career.index')->extends('layouts.app');
    }
}
