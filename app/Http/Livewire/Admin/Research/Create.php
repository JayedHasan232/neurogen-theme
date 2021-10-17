<?php

namespace App\Http\Livewire\Admin\Research;

use Livewire\Component;
use App\Models\Research;

class Create extends Component
{
    public $privacy = 1;
    public $title;
    public $author;
    public $date;
    public $source;
    public $overview;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'string',
            'source' => 'required',
            'overview' => 'string',
        ]);

        $research = Research::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'author' => $this->author,
            'date' => $this->date ?? now(),
            'source' => $this->source,
            'overview' => $this->overview,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.research.create')->extends('layouts.admin');
    }
}
