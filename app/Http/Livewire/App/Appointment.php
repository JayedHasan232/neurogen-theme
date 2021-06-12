<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

use App\Models\SiteInfo as Info;
use App\Models\Blog;

class Appointment extends Component
{
    public $info;
    public $blogs;

    public function mount()
    {
        $this->info = Info::find(1);

        $this->blogs = Blog::where('privacy', 1)
                            ->latest()
                            ->get()
                            ->take(6);
    }
    public function render()
    {
        return view('livewire.app.appointment')->extends('layouts.app');
    }
}
