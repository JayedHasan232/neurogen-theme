<?php

namespace App\Http\Livewire\Admin\Medicine;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Medicine;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $title;
    public $price;
    public $overview;
    public $image;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required|string',
            'price' => 'required|string',
            'overview' => 'required|string',
            'image' => 'required|image',
        ]);

        $medicine = Medicine::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'price' => $this->price,
            'overview' => $this->overview,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($this->image){
            $medicine->update([
                'image' => $this->image->store('medicines')
            ]);
        }
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.medicine.create')->extends('layouts.admin');
    }
}
