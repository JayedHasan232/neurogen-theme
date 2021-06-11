<?php

namespace App\Http\Livewire\App\About;

use Livewire\Component;
use App\Models\Partner;

class Partners extends Component
{
    public $partners;

    public function mount()
    {
        $this->partners = Partner::where('privacy', 1)->get();
    }
    public function render()
    {
        return view('livewire.app.about.partners');
    }
}
