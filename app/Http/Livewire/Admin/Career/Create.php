<?php

namespace App\Http\Livewire\Admin\Career;

use Livewire\Component;

use Str;
use App\Models\Career;

class Create extends Component
{
    public $privacy = 1;
    public $salary_range;
    public $due_date;
    public $title;
    public $url;
    public $article;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'article' => 'required|string',
        ]);

        Career::create([
            'privacy' => $this->privacy,
            'salary_range' => $this->salary_range,
            'due_date' => $this->due_date,
            'title' => $this->title,
            'url' => $this->url,
            'article' => $this->article,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.career.create')->extends('layouts.admin');
    }
}
