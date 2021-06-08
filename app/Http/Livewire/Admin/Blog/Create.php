<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use App\Models\Blog;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;

class Create extends Component
{
    use WithFileUploads;
    
    public $categories;
    public $subcategories = [];

    public $title;
    public $url;
    public $privacy = 1;
    public $category;
    public $subcategory;
    public $image;
    public $article;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $tags;

    public function mount()
    {
        $this->categories = Category::where('privacy', 1)->get();
    }

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function updatedCategory()
    {
        if($this->category){
            $this->subcategories = Category::find($this->category)->subcategories()->where('privacy', 1)->get();
        }else{
            $this->subcategories = [];
        }
    }

    public function updatedTags()
    {
        $this->meta_keywords = $this->tags;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'image' => 'required|image',
            'category' => 'required',
            'article' => 'required|string',
        ]);

        $blog = Blog::create([
            'privacy' => $this->privacy,
            'category_id' => $this->category,
            'sub_category_id' => $this->subcategory,
            'title' => $this->title,
            'url' => $this->url,
            'article' => $this->article,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'tags' => $this->tags,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($blog && $this->image){
            $blog->image = $this->image->store('images/blog');
            $blog->save();
        }
            
        $this->reset();
        $this->categories = Category::where('privacy', 1)->get();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.blog.create')->extends('layouts.admin');
    }
}
