<?php

namespace App\Http\Livewire\Admin\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Helper\ImageResize as Image;
use App\Models\Gallery;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $type = 1;
    public $title;
    public $images;
    public $video_link;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'type' => 'required',
        ]);

        if($this->type == 1){
            $this->validate([
                'images.*' => 'required|image',
            ]);
        }else{
            $this->validate([
                'video_link' => 'required',
            ]);
        }

        if($this->type == 1){
        
            // Single Image
            // $entry = Gallery::create([
            //     'privacy' => $this->privacy,
            //     'type' => $this->type,
            //     'title' => $this->title,
            //     'created_by' => auth()->id(),
            //     'created_at' => now(),
            // ]);

            // $image = $this->image;
            // $dimension = (object) [
            //     'medium' => (object) [
            //         'width' => 356,
            //         'height' => 250,
            //     ],
            //     'small' => (object) [
            //         'width' => 156,
            //         'height' => 116,
            //     ]
            // ];
            // $path = "gallery";

            // $result = Image::store($image, $dimension, $path);

            // $entry->update([
            //     "source" => $result->image,
            //     "image_medium" => $result->image_medium,
            //     "image_small" => $result->image_small,
            // ]);

            // Multiple Image
            foreach ($this->images as $image) {

                $entry = Gallery::create([
                    'privacy' => $this->privacy,
                    'type' => $this->type,
                    'title' => $this->title,
                    'created_by' => auth()->id(),
                    'created_at' => now(),
                ]);

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
    
                $entry->update([
                    "source" => $result->image,
                    "image_medium" => $result->image_medium,
                    "image_small" => $result->image_small,
                ]);
            }
            
        }else{
            Gallery::create([
                'privacy' => $this->privacy,
                'type' => $this->type,
                'title' => $this->title,
                'source' => $this->video_link,
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
        }
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.gallery.create')->extends('layouts.admin');
    }
}
