<?php

namespace App\Http\Livewire\App\Contact;

use Livewire\Component;

use App\Models\SiteInfo as Info;

class Index extends Component
{
    public $mobile, $email, $address, $facebook_page, $facebook_group, $twitter, $linkedin, $youtube;
    
    public function mount()
    {
        $info = Info::find(1);

        $this->mobile = $info->mobile;
        $this->email = $info->email;
        $this->address = $info->address;
        $this->facebook_page = $info->facebook_page;
        $this->facebook_group = $info->facebook_group;
        $this->twitter = $info->twitter;
        $this->linkedin = $info->linkedin;
        $this->youtube = $info->youtube;
    }

    public function render()
    {
        return view('livewire.app.contact.index')->extends('layouts.app');
    }
}
