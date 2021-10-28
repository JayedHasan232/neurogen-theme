<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;
use App\Models\Service;

class GeneticTest extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::where('privacy', 1)
                                ->where('type', 'genetic_test')
                                ->get();
    }

    public function render()
    {
        return view('livewire.app.services.genetic-test')->extends('layouts.app');
    }
}
