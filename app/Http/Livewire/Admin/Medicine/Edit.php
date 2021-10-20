<?php

namespace App\Http\Livewire\Admin\Medicine;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Medicine;

class Edit extends Component
{
    use WithFileUploads;

    public $medicine;

    public $privacy;
    public $title;
    public $price;
    public $overview;
    public $image;

    public function mount($id)
    {
        $this->medicine = Medicine::findOrFail($id);

        $this->privacy = $this->medicine->privacy;
        $this->title = $this->medicine->title;
        $this->price = $this->medicine->price;
        $this->overview = $this->medicine->overview;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required|string',
            'price' => 'required|string',
            'overview' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $this->medicine->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'price' => $this->price,
            'overview' => $this->overview,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){
            $this->medicine->update([
                'image' => $this->image->store('medicines')
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.medicine.edit')->extends('layouts.admin');
    }
}
