<?php

namespace App\Http\Livewire\App\Home;

use Livewire\Component;
use Artisan;

class Index extends Component
{
    public function mount()
    {
        // Artisan::call('optimize:clear');
    }

    public function render()
    {
        return view('livewire.app.home.index')->extends('layouts.app');
    }
}
