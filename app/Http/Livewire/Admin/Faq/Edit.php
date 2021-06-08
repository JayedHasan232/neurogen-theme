<?php

namespace App\Http\Livewire\Admin\Faq;

use Livewire\Component;

use App\Models\Faq;

class Edit extends Component
{
    public $faq;

    public $question;
    public $answer;
    public $privacy;

    protected $rules = [
        'question' => 'required|string',
        'answer' => 'required|string',
        'privacy' => 'required',
    ];

    public function mount($id)
    {
        $this->faq = Faq::findOrFail($id);

        $this->question = $this->faq->question;
        $this->answer = $this->faq->answer;
        $this->privacy = $this->faq->privacy;
    }

    public function store()
    {
        $this->validate();

        $this->faq->update([
            'question' => $this->question,
            'answer' => $this->answer,
            'privacy' => $this->privacy,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.faq.edit')->extends('layouts.admin');
    }
}
