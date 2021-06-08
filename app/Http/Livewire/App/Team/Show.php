<?php

namespace App\Http\Livewire\App\Team;

use Livewire\Component;

use App\Models\Team;
use App\Models\SiteInfo as Info;

class Show extends Component
{
    public $type;
    public $member;
    public $info;

    public function mount($type, $url)
    {
        if($type == 'doctors'){
            $this->type = 1;
        }
        elseif($type == 'lab-personnel'){
            $this->type = 2;
        }
        elseif($type == 'psychologists'){
            $this->type = 3;
        }
        elseif($type == 'therapists'){
            $this->type = 4;
        }
        elseif($type == 'nutritionists'){
            $this->type = 5;
        }

        $this->member = Team::where('privacy', 1)->where('url', $url)->firstOrFail();
        $this->info = Info::find(1);
    }

    public function render()
    {
        return view('livewire.app.team.show')->extends('layouts.app');
    }
}
