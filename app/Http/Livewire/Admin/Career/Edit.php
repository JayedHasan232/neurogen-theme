<?php

namespace App\Http\Livewire\Admin\Career;

use Livewire\Component;

use Str;
use App\Models\Career;

class Edit extends Component
{
    public $career;
    
    public $privacy;
    public $salary_range;
    public $due_date;
    public $title;
    public $url;
    public $article;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount($id)
    {
        $this->career = Career::findOrFail($id);
        $this->privacy = $this->career->privacy;
        $this->salary_range = $this->career->salary_range;
        $this->due_date = $this->career->due_date;
        $this->title = $this->career->title;
        $this->url = $this->career->url;
        $this->article = $this->career->article;
        $this->meta_title = $this->career->meta_title;
        $this->meta_description = $this->career->meta_description;
        $this->meta_keywords = $this->career->meta_keywords;
    }

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
        
        $this->career->update([
            'privacy' => $this->privacy,
            'salary_range' => $this->salary_range,
            'due_date' => $this->due_date,
            'title' => $this->title,
            'url' => $this->url,
            'article' => $this->article,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.career.edit')->extends('layouts.admin');
    }
}
