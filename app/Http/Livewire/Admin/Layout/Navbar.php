<?php

namespace App\Http\Livewire\Admin\Layout;

use Livewire\Component;

use App\Models\SiteInfo as Info;

class Navbar extends Component
{
    public $info;

    public function mount()
    {
        $this->info = Info::find(1);
    }

    public function render()
    {
        return view('livewire.admin.layout.navbar');
    }
}
