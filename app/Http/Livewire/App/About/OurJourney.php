<?php

namespace App\Http\Livewire\App\About;

use Livewire\Component;
use App\Models\Journey;

class OurJourney extends Component
{
    public $identifiers;
    public $journeys;

    public function mount()
    {
        $this->identifiers = [
            'যাত্রা শুরু',
            'সম্প্রসারণ',
            'এগিয়ে চলা',
            'নতুনত্ব',
            'অর্জন',
        ];

        $this->journeys = Journey::where('privacy', 1)->get();
    }

    public function render()
    {
        return view('livewire.app.about.our-journey');
    }
}
