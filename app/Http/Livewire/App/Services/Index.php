<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Service;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::where('privacy', 1)->get();
    }
    public function render()
    {
        return view('livewire.app.services.index')->extends('layouts.app');
    }
}
