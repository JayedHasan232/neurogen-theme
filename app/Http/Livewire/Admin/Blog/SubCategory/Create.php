<?php

namespace App\Http\Livewire\Admin\Blog\SubCategory;

use Livewire\Component;

use Str;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;

class Create extends Component
{
    public $categories;

    public $privacy = 1;
    public $category;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount()
    {
        $this->categories = Category::where('privacy', 1)->get();
    }

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
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        SubCategory::create([
            'privacy' => $this->privacy,
            'category_id' => $this->category,
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
        $this->categories = Category::where('privacy', 1)->get();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.blog.sub-category.create')->extends('layouts.admin');
    }
}
