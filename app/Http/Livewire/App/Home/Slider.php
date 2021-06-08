<?php

namespace App\Http\Livewire\App\Home;

use Livewire\Component;
use App\Models\Slider as Carousel;

class Slider extends Component
{
    public $sliders;

    public function mount()
    {
        $this->sliders = Carousel::where('privacy', 1)->get();
    }

    public function render()
    {
        return view('livewire.app.home.slider');
    }
}
