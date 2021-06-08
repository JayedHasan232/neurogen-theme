<?php

namespace App\Http\Livewire\Admin\Research;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Research;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $title;
    public $date;
    public $file;
    public $overview;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'string',
            'file' => 'required',
            'overview' => 'string',
        ]);

        $research = Research::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'date' => $this->date ?? now(),
            'overview' => $this->overview,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($research && $this->file){
            $research->source = $this->file->store('files/research');
            $research->save();
        }
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.research.create')->extends('layouts.admin');
    }
}
