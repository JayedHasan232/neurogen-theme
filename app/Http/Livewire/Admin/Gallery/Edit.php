<?php

namespace App\Http\Livewire\Admin\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Helper\ImageResize as Image;
use App\Models\Gallery;

class Edit extends Component
{
    use WithFileUploads;

    public $item;

    public $privacy;
    public $type;
    public $title;
    public $image;
    public $video_link;

    public function mount($id)
    {
        $this->item = Gallery::findOrFail($id);

        $this->privacy = $this->item->privacy;
        $this->type = $this->item->type;
        $this->title = $this->item->title;

        if($this->type == 2){
            $this->video_link = $this->item->source;
        }
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'type' => 'required',
        ]);

        if($this->type == 2){
            $this->validate([
                'video_link' => 'required',
            ]);
        }

        $this->item->update([
            'privacy' => $this->privacy,
            'type' => $this->type,
            'title' => $this->title,
            'source' => $this->video_link,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){

            Storage::delete($this->item->source);
            Storage::delete($this->item->image_medium);
            Storage::delete($this->item->image_small);

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 356,
                    'height' => 250,
                ],
                'small' => (object) [
                    'width' => 156,
                    'height' => 116,
                ]
            ];
            $path = "gallery";

            $result = Image::store($image, $dimension, $path);

            $this->item->update([
                "source" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.gallery.edit')->extends('layouts.admin');
    }
}
