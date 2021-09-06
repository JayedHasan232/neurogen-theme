<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

use Mail;
use App\Mail\Appointment as Appoint;
use App\Models\SiteInfo as Info;
use App\Models\Blog;

class Appointment extends Component
{
    public $info, $blogs;
    public $name, $phone, $email, $date, $message;
    
    public function mount()
    {
        $this->dataLoader();
    }

    public function dataLoader()
    {
        $this->info = Info::find(1);
        $this->blogs = Blog::where('privacy', 1)
                            ->latest()
                            ->get()
                            ->take(6);
    }

    public function send()
    {
        $data = (object) [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'date' => $this->date,
            'message' => $this->message,
        ];
        Mail::to('appointment@neurogenbd.com')->send(new Appoint($data));

        $this->reset();
        $this->dataLoader();
        
        return back()->with('success', 'Successfully Submitted!');
    }

    public function render()
    {
        return view('livewire.app.appointment')->extends('layouts.app');
    }
}
