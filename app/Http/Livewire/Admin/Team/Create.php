<?php

namespace App\Http\Livewire\Admin\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Helper\ImageResize as Image;

use Str;
use App\Models\Team;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $type = 1;
    public $name;
    public $url;
    public $designation;
    public $degrees;
    public $email;
    public $image;
    public $summary;

    public function updatedName()
    {
        $this->url = Str::slug($this->name);
    }

    public function store()
    {
        $this->validate([
            'type' => 'required',
            'name' => 'required',
            'url' => 'required',
            'designation' => 'required',
            'degrees' => '',
            'email' => 'email',
            'summary' => '',
        ]);

        
        $team = Team::create([
            'member_type' => $this->type,
            'name' => $this->name,
            'url' => $this->url,
            'designation' => $this->designation,
            'degrees' => $this->degrees,
            'email' => $this->email,
            'summary' => $this->summary,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($team && $this->image){
            $image = $this->image;
                $dimension = (object) [
                    'medium' => (object) [
                        'width' => 125,
                        'height' => 125,
                    ],
                    'small' => (object) [
                        'width' => 100,
                        'height' => 100,
                    ]
                ];
                $path = "team";
    
                $result = Image::store($image, $dimension, $path);
    
                $team->update([
                    "image" => $result->image,
                    "image_medium" => $result->image_medium,
                    "image_small" => $result->image_small,
                ]);
        }
            
        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.team.create')->extends('layouts.admin');
    }
}
