<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;

use Str;
use App\Models\Blog;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;
use Livewire\WithFileUploads;

class Edit extends Component
{   
    use WithFileUploads;
    
    public $blog;
    public $categories;
    public $subcategories = [];

    public $privacy;
    public $title;
    public $url;
    public $category;
    public $subcategory;
    public $meta_title;
    public $meta_keywords;
    public $tags;

    public function mount($id)
    {
        $this->blog = Blog::findOrFail($id);
        $this->categories = Category::where('privacy', 1)->get();
        $this->subcategories = Category::find($this->blog->category_id)->subcategories()->where('privacy', 1)->get();

        $this->privacy = $this->blog->privacy;
        $this->category = $this->blog->category_id;
        $this->subcategory = $this->blog->sub_category_id;
        $this->title = $this->blog->title;
        $this->url = $this->blog->url;
        $this->article = $this->blog->article;
        $this->meta_title = $this->blog->meta_title;
        $this->meta_description = $this->blog->meta_description;
        $this->meta_keywords = $this->blog->meta_keywords;
        $this->tags = $this->blog->tags;
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
        return view('livewire.admin.blog.edit')->extends('layouts.admin');
    }
}
