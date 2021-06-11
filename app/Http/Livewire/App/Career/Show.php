<?php

namespace App\Http\Livewire\App\Career;

use Livewire\Component;
use App\Models\Career;

class Show extends Component
{
    public $career;

    public function mount($url)
    {
        $this->career = Career::where('url', $url)->where('privacy', 1)->firstOrFail();
    }
    
    public function render()
    {
        return view('livewire.app.career.show')->extends('layouts.app');
    }
}
