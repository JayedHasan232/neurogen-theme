<?php

namespace App\Http\Livewire\Admin\Research;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Models\Research;

class Edit extends Component
{
    use WithFileUploads;

    public $research;

    public $privacy;
    public $title;
    public $date;
    public $file;
    public $overview;

    public function mount($id)
    {
        $this->research = Research::findOrFail($id);

        $this->privacy = $this->research->privacy;
        $this->title = $this->research->title;
        $this->date = $this->research->date;
        $this->overview = $this->research->overview;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'string',
            'overview' => 'string',
        ]);

        $this->research->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'date' => $this->date,
            'overview' => $this->overview,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->file){

            Storage::delete($this->research->source);
            
            $this->research->source = $this->file->store('files/research');
            $this->research->save();
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.research.edit')->extends('layouts.admin');
    }
}
