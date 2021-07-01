<?php

namespace App\Http\Livewire\Admin\About;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Models\Journey;

class OurJourney extends Component
{
    use WithFileUploads;

    public $identifiers = [];
    public $journeys = [];

    public $privacy = 1;
    public $identifier;
    public $title;
    public $overview;
    public $image;
    
    public $update_privacy;
    public $update_identifier;
    public $update_title;
    public $update_overview;

    public function mount()
    {
        $this->defaultData();
    }

    public function defaultData()
    {
        $this->identifiers = [
            'যাত্রা শুরু',
            'সম্প্রসারণ',
            'এগিয়ে চলা',
            'নতুনত্ব',
            'অর্জন',
        ];

        $this->journeys = Journey::all();
    }

    public function store()
    {
        $journey = Journey::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'identifier' => $this->identifier,
            'overview' => $this->overview,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($this->image){

            $this->validate([
                'image' => 'image',
            ]);

            $journey->update([
                'image' => $this->image->store('images/our-journey'),
            ]);
        }

        $this->reset();
        $this->defaultData();

        return back()->with('success', 'Success!');
    }

    public function selectedJourney($id)
    {
        $journey = Journey::findOrFail($id);
        $this->update_privacy = $journey->privacy;
        $this->update_identifier = $journey->identifier;
        $this->update_title = $journey->title;
        $this->update_overview = $journey->overview;
    }

    public function update($id)
    {
        $journey = Journey::findOrFail($id);
        $journey->update([
            'privacy' => $this->update_privacy,
            'identifier' => $this->update_identifier,
            'title' => $this->update_title,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){
            Storage::delete($journey->image);

            $journey->update([
                'image' => $this->image->store('images/our-journey'),
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        $this->reset();
        $this->defaultData();
        $this->selectedJourney($id);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.about.our-journey')->extends('layouts.admin');
    }
}
