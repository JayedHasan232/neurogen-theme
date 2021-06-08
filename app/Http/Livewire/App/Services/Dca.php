<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Text;

class Dca extends Component
{
    public $test;

    public function mount()
    {
        $this->test = Text::where('identifier', 'deep-clinical-assessment')->firstOrFail();
    }

    public function render()
    {
        return view('livewire.app.services.deep-clinical-assessment')->extends('layouts.app');
    }
}
