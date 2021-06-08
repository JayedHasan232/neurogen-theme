<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Text;

class Therapeutics extends Component
{
    public $test;

    public function mount()
    {
        $this->test = Text::where('identifier', 'therapeutics')->firstOrFail();
    }

    public function render()
    {
        return view('livewire.app.services.therapeutics')->extends('layouts.app');
    }
}
