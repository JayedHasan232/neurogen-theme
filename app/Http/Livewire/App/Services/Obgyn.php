<?php

namespace App\Http\Livewire\App\Services;

use Livewire\Component;
use App\Models\Team;

class Obgyn extends Component
{
    public $type = 9;
    public $doctors;

    public function mount()
    {
        $this->doctors = Team::where('privacy', 1)
                            ->where('member_type', $this->type)
                            ->orderBy('position', 'asc')
                            ->get();
    }

    public function render()
    {
        return view('livewire.app.services.obgyn')->extends('layouts.app');
    }
}
