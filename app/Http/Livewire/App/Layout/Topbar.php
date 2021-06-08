<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;
use App\Models\SiteInfo as Info;

class Topbar extends Component
{
    public $mobile, $email, $facebook_page, $twitter, $linkedin, $youtube;
    
    public function mount()
    {
        $info = Info::find(1);

        $this->mobile = $info->mobile;
        $this->email = $info->email;
        $this->facebook_page = $info->facebook_page;
        $this->twitter = $info->twitter;
        $this->linkedin = $info->linkedin;
        $this->youtube = $info->youtube;
    }

    public function render()
    {
        return view('livewire.app.layout.topbar');
    }
}
