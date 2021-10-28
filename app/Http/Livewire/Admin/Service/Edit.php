<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use Storage;
use App\Models\Service;

class Edit extends Component
{
    use WithFileUploads;
    
    public $service;

    public $type;
    public $title;
    public $url;
    public $privacy;
    public $image;
    public $article;
    public $overview;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount($id)
    {
        $this->service = Service::findOrFail($id);

        $this->privacy = $this->service->privacy;
        $this->type = $this->service->type ?? 'regular';
        $this->title = $this->service->title;
        $this->url = $this->service->url;
        $this->article = $this->service->article;
        $this->overview = $this->service->overview;
        $this->meta_title = $this->service->meta_title;
        $this->meta_description = $this->service->meta_description;
        $this->meta_keywords = $this->service->meta_keywords;
    }

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
            'type' => 'required|string',
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'article' => 'required|string',
            'overview' => 'required|string',
        ]);
        
        $this->service->update([
            'type' => $this->type,
            'title' => $this->title,
            'url' => $this->url,
            'privacy' => $this->privacy,
            'article' => $this->article,
            'overview' => $this->overview,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){

            Storage::delete($this->service->image);

            $this->service->image = $this->image->store('images/service');
            $this->service->save();
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.service.edit')->extends('layouts.admin');
    }
}
