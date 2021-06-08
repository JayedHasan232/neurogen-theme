<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use Livewire\Component;

use Str;
use App\Models\BlogCategory as Category;

class Edit extends Component
{
    public $category;

    public $privacy;
    public $title;
    public $url;
    public $meta_title;
    public $description;
    public $meta_description;
    public $meta_keywords;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);

        $this->privacy = $this->category->privacy;
        $this->title = $this->category->title;
        $this->url = $this->category->url;
        $this->description = $this->category->description;
        $this->meta_title = $this->category->meta_title;
        $this->meta_description = $this->category->meta_description;
        $this->meta_keywords = $this->category->meta_keywords;
    }

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        
        $this->category->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
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
        return view('livewire.admin.blog.category.edit')->extends('layouts.admin');
    }
}
