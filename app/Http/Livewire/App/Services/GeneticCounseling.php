<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Text;

class GeneticCounseling extends Component
{
    public $test;

    public function mount()
    {
        $this->test = Text::where('identifier', 'genetic-counseling')->firstOrFail();
    }

    public function render()
    {
        return view('livewire.app.services.genetic-counseling')->extends('layouts.app');
    }
}
