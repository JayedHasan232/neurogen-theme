<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;
use App\Models\Service;

class Dca extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::where('privacy', 1)
                                ->where('type', 'deep_clinical_assessment')
                                ->get();
    }

    public function render()
    {
        return view('livewire.app.services.deep-clinical-assessment')->extends('layouts.app');
    }
}
