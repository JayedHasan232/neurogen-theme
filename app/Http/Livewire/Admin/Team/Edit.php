<?php

namespace App\Http\Livewire\Admin\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use Storage;
use App\Models\Team;

class Edit extends Component
{
    use WithFileUploads;

    public $member;

    public $privacy;
    public $type;
    public $name;
    public $url;
    public $designation;
    public $degrees;
    public $email;
    public $image;
    public $summary;

    public function mount($id)
    {
        $this->member = Team::findOrFail($id);

        $this->privacy = $this->member->privacy;
        $this->type = $this->member->member_type;
        $this->name = $this->member->name;
        $this->url = $this->member->url;
        $this->designation = $this->member->designation;
        $this->degrees = $this->member->degrees;
        $this->email = $this->member->email;
        $this->summary = $this->member->summary;
    }

    public function updatedName()
    {
        $this->url = Str::slug($this->name);
    }

    public function store()
    {
        $this->validate([
            'type' => 'required',
            'name' => 'required',
            'url' => 'required',
            'designation' => 'required',
            'degrees' => 'required',
            'email' => 'email',
            'summary' => 'required',
        ]);

        
        $this->member->update([
            'privacy' => $this->privacy,
            'member_type' => $this->type,
            'name' => $this->name,
            'url' => $this->url,
            'designation' => $this->designation,
            'degrees' => $this->degrees,
            'email' => $this->email,
            'summary' => $this->summary,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){

            Storage::delete($this->member->image);

            $this->member->image = $this->image->store('images/team');
            $this->member->save();
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.team.edit')->extends('layouts.admin');
    }
}
