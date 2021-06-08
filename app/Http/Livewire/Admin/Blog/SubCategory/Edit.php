<?php

namespace App\Http\Livewire\Admin\Blog\SubCategory;

use Livewire\Component;

use Str;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;

class Edit extends Component
{
    public $categories;
    public $subcategory;

    public $privacy;
    public $category;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount($id)
    {
        $this->categories = Category::where('privacy', 1)->get();
        $this->subcategory = SubCategory::findOrFail($id);

        $this->privacy = $this->subcategory->privacy;
        $this->category = $this->subcategory->category_id;
        $this->title = $this->subcategory->title;
        $this->url = $this->subcategory->url;
        $this->description = $this->subcategory->description;
        $this->meta_title = $this->subcategory->meta_title;
        $this->meta_description = $this->subcategory->meta_description;
        $this->meta_keywords = $this->subcategory->meta_keywords;
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
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        $this->subcategory->update([
            'privacy' => $this->privacy,
            'category_id' => $this->category,
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
        return view('livewire.admin.blog.sub-category.edit')->extends('layouts.admin');
    }
}
