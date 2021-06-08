<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Text;

class GeneticTest extends Component
{
    public $test;

    public function mount()
    {
        $this->test = Text::where('identifier', 'genetic-test')->firstOrFail();
    }

    public function render()
    {
        return view('livewire.app.services.genetic-test')->extends('layouts.app');
    }
}
