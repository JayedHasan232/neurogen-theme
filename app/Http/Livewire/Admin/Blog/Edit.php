<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Helper\ImageResize as Image;

use Str;
use App\Models\Blog;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;

class Edit extends Component
{
    use WithFileUploads;
    
    public $blog;
    public $categories;
    public $subcategories = [];

    public $title;
    public $url;
    public $privacy;
    public $category;
    public $subcategory;
    public $image;
    public $article;
    public $meta_title;
    public $meta_description;
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

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'category' => 'required',
            'article' => 'required|string',
        ]);
        
        $this->blog->update([
            'title' => $this->title,
            'url' => $this->url,
            'privacy' => $this->privacy,
            'category_id' => $this->category,
            'sub_category_id' => $this->subcategory,
            'article' => $this->article,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'tags' => $this->tags,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){

            Storage::delete($this->blog->image);
            Storage::delete($this->blog->image_medium);
            Storage::delete($this->blog->image_small);

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 600,
                    'height' => 240,
                ],
                'small' => (object) [
                    'width' => 360,
                    'height' => 160,
                ]
            ];
            $path = "blog";

            $result = Image::store($image, $dimension, $path);

            $this->blog->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit')->extends('layouts.admin');
    }
}
