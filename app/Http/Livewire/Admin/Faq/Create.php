<?php

namespace App\Http\Livewire\Admin\Faq;

use Livewire\Component;

use App\Models\Faq;

class Create extends Component
{

    public $faqs;

    public $question;
    public $answer;
    public $privacy = 1;

    protected $rules = [
        'question' => 'required|string',
        'answer' => 'required|string',
        'privacy' => 'required',
    ];

    public function mount()
    {
        $this->faqs = Faq::all();
    }

    public function store()
    {
        $this->validate();

        Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'privacy' => $this->privacy,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.faq.create')->extends('layouts.admin');
    }
}
