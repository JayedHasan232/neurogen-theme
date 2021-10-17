<?php

namespace App\Http\Livewire\Admin\Research;

use Livewire\Component;
use App\Models\Research;

class Edit extends Component
{
    public $research;

    public $privacy;
    public $title;
    public $author;
    public $date;
    public $source;
    public $overview;

    public function mount($id)
    {
        $this->research = Research::findOrFail($id);

        $this->privacy = $this->research->privacy;
        $this->title = $this->research->title;
        $this->author = $this->research->author;
        $this->date = $this->research->date;
        $this->source = $this->research->source;
        $this->overview = $this->research->overview;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'string',
            'source' => 'string',
            'overview' => 'string',
        ]);

        $this->research->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'author' => $this->author,
            'date' => $this->date,
            'source' => $this->source,
            'overview' => $this->overview,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.research.edit')->extends('layouts.admin');
    }
}
