<?php

namespace App\Http\Livewire\App\Contact;

use Livewire\Component;

use Mail;
use App\Mail\Contact;
use App\Models\SiteInfo as Info;

class Index extends Component
{
    public $cName, $cPhone, $cEmail, $cMessage;
    public $mobile, $email, $address, $facebook_page, $facebook_group, $twitter, $linkedin, $youtube;
    
    public function mount()
    {
        $this->dataLoader();
    }

    public function dataLoader()
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

    public function send()
    {
        $data = (object) [
            'name' => $this->cName,
            'phone' => $this->cPhone,
            'email' => $this->cEmail,
            'message' => $this->cMessage,
        ];
        Mail::to('info@neurogenbd.com')->cc('neurogenbd@gmail.com')->send(new Contact($data));

        $this->reset();
        $this->dataLoader();
        
        return back()->with('success', 'Successfully Sent!');
    }

    public function render()
    {
        return view('livewire.app.contact.index')->extends('layouts.app');
    }
}
