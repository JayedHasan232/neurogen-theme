<?php

namespace App\Http\Livewire\App\About;

use Livewire\Component;
use App\Models\About;

class Index extends Component
{
    public $about;

    public function mount()
    {
        $this->about = About::find(1);
    }
    
    public function render()
    {
        return view('livewire.app.about.index')->extends('layouts.app');
    }
}
