<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;

use App\Models\Service;

class Show extends Component
{
    public $service;
    public $relatedServices;

    public function mount($url)
    {
        $this->service = Service::where('url', $url)->where('privacy', 1)->firstOrFail();

        $this->relatedServices = Service::where('id', "!=", $this->service->id)
                                        ->where('privacy', 1)
                                        ->get()
                                        ->take(6);
    }
    
    public function render()
    {
        return view('livewire.app.services.show')->extends('layouts.app');
    }
}
