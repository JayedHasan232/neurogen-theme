<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use Livewire\Component;

use Str;
use App\Models\BlogCategory as Category;

class Create extends Component
{
    public $privacy = 1;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function updatedDescription()
    {
        $this->meta_description = $this->description;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        Category::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
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
        return view('livewire.admin.blog.category.create')->extends('layouts.admin');
    }
}
