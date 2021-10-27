<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;

use Str;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;
use Livewire\WithFileUploads;

class Create extends Component
{   
    use WithFileUploads;
    
    public $categories;
    public $subcategories = [];

    public $title;
    public $url;
    public $category;
    public $subcategory;
    public $meta_title;
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

    public function render()
    {
        return view('livewire.admin.blog.create')->extends('layouts.admin');
    }
}
