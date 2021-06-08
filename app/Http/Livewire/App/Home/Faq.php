<?php

namespace App\Http\Livewire\App\Home;

use Livewire\Component;
use App\Models\Faq as Faqs;

class Faq extends Component
{
    public $faqs;

    public function mount()
    {
        $this->faqs = Faqs::where('privacy', 1)->get();
    }

    public function render()
    {
        return view('livewire.app.home.faq');
    }
}
