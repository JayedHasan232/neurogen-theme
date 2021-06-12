<?php

namespace App\Http\Livewire\App\Blog;

use Livewire\Component;

use App\Models\Blog;

class Show extends Component
{
    public $blog;
    public $relatedBlogs;

    public function mount($url)
    {
        $this->blog = Blog::where('url', $url)->where('privacy', 1)->firstOrFail();
        $this->blog->tags = $this->blog->tags ? explode( ',', $this->blog->tags ) : null;

        $this->relatedBlogs = $this->blog->category->blogs()
                            ->where('id', "!=", $this->blog->id)
                            ->where('privacy', 1)
                            ->latest()
                            ->get()
                            ->take(6);
    }
    
    public function render()
    {
        return view('livewire.app.blog.show')->extends('layouts.app');
    }
}
