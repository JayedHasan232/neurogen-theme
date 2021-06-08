<?php

namespace App\Http\Livewire\Admin\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use App\Models\Team;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $type = 1;
    public $name;
    public $url;
    public $designation;
    public $degrees;
    public $email;
    public $image;
    public $summary;

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

        
        $team = Team::create([
            'member_type' => $this->type,
            'name' => $this->name,
            'url' => $this->url,
            'designation' => $this->designation,
            'degrees' => $this->degrees,
            'email' => $this->email,
            'summary' => $this->summary,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($team && $this->image){
            $team->image = $this->image->store('images/team');
            $team->save();
        }
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.team.create')->extends('layouts.admin');
    }
}
