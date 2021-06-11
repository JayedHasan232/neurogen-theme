<?php

namespace App\Http\Livewire\App\About;

use Livewire\Component;

use App\Models\SiteInfo as Info;

class Index extends Component
{
    public $overview;
    
    public function mount()
    {
        $this->overview = Info::find(1)->overview;
    }
    
    public function render()
    {
        return view('livewire.app.about.index')->extends('layouts.app');
    }
}
