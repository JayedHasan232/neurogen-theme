<?php

namespace App\Http\Livewire\Admin\About;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Models\Partner;

class Partners extends Component
{
    use WithFileUploads;

    public $partners;

    public $privacy;
    public $name;
    public $image;
    
    public $update_privacy;
    public $update_name;

    public function mount()
    {
        $this->partners = Partner::all();
    }

    public function store()
    {
        $this->validate([
            'image' => 'image',
        ]);

        Partner::create([
            'privacy' => $this->privacy,
            'name' => $this->name,
            'image' => $this->image->store('images/partners'),
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function selectedPartner($id)
    {
        $partner = Partner::findOrFail($id);
        $this->update_privacy = $partner->privacy;
        $this->update_name = $partner->name;
    }

    public function update($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->update([
            'privacy' => $this->update_privacy,
            'name' => $this->update_name,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){
            Storage::delete($partner->image);

            $partner->update([
                'image' => $this->image->store('images/partners'),
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        $this->reset();
        $this->partners = Partner::all();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.about.partners')->extends('layouts.admin');
    }
}
