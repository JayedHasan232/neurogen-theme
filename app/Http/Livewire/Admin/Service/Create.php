<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use App\Models\Service;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $url;
    public $privacy = 1;
    public $image;
    public $article;
    public $overview;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function updatedOverview()
    {
        $this->meta_description = $this->overview;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'image' => 'required|image',
            'article' => 'required|string',
            'overview' => 'required|string',
        ]);

        $service = Service::create([
            'title' => $this->title,
            'url' => $this->url,
            'privacy' => $this->privacy,
            'article' => $this->article,
            'overview' => $this->overview,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($service && $this->image){
            $service->image = $this->image->store('images/service');
            $service->save();
        }

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.service.create')->extends('layouts.admin');
    }
}
