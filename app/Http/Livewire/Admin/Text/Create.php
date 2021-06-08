<?php

namespace App\Http\Livewire\Admin\Text;

use Livewire\Component;

use App\Models\Text;

class Create extends Component
{

    public $identifier;
    public $article;

    protected $rules = [
        'identifier' => 'required|string',
        'article' => 'required|string',
    ];

    public function store()
    {
        $this->validate();

        Text::create([
            'identifier' => $this->identifier,
            'article' => $this->article,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.text.create')->extends('layouts.admin');
    }
}
