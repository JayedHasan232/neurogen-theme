<?php

namespace App\Http\Livewire\App\Research;

use Livewire\Component;
use App\Models\Research;

class Index extends Component
{
    public $researches;

    public function mount()
    {
        $this->researches = Research::where('privacy', 1)->get();
    }

    public function render()
    {
        return view('livewire.app.research.index')->extends('layouts.app');
    }
}
