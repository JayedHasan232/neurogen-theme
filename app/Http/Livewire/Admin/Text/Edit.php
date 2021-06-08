<?php

namespace App\Http\Livewire\Admin\Text;

use Livewire\Component;

use App\Models\Text;

class Edit extends Component
{
    public $text;

    public $identifier;
    public $article;

    protected $rules = [
        'identifier' => 'required|string',
        'article' => 'required|string',
    ];

    public function mount($id)
    {
        $this->text = Text::findOrFail($id);

        $this->identifier = $this->text->identifier;
        $this->article = $this->text->article;
    }

    public function store()
    {
        $this->validate();

        $this->text->update([
            'identifier' => $this->identifier,
            'article' => $this->article,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.text.edit')->extends('layouts.admin');
    }
}
