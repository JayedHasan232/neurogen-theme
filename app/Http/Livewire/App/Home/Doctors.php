<?php

namespace App\Http\Livewire\App\Home;

use Livewire\Component;
use App\Models\Team;

class Doctors extends Component
{
    public $doctors;

    public function mount()
    {
        $this->doctors = Team::where('privacy', 1)->where('member_type', 1)->get()->take(3);
    }
    public function render()
    {
        return view('livewire.app.home.doctors');
    }
}
