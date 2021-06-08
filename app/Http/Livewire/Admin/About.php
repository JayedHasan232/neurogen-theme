<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Models\About as Data;

class About extends Component
{
    use WithFileUploads;

    public $about;

    public $title;
    public $overview;
    public $circle;
    public $image;

    public function mount()
    {
        $this->about = Data::find(1);

        $this->title = $this->about->title ?? '';
        $this->overview = $this->about->overview ?? '';
        $this->circle = $this->about->circle ?? '';
    }

    public function updateInfo()
    {
        if(!$this->about){
            $this->about = Data::create([
                'title' => $this->title,
                'overview' => $this->overview,
                'circle' => $this->circle,
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
        }else{
            $this->about->update([
                'title' => $this->title,
                'overview' => $this->overview,
                'circle' => $this->circle,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }        

        if($this->about){
            if($this->image){

                Storage::delete($this->about->image);

                $this->about->image = $this->image->store('images/pages/about');
                $this->about->save();

            }
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.about')->extends('layouts.admin');
    }
}
