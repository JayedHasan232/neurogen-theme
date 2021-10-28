<?php

namespace App\Http\Livewire\App\Team;

use Livewire\Component;

use App\Models\Team;

class Index extends Component
{
    public $member_type;
    public $type = 1;
    public $members;

    public function mount($type)
    {
        $this->member_type = $type;

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

        $this->members = Team::where('privacy', 1)
                            ->where('member_type', $this->type)
                            ->orderBy('position', 'asc')
                            ->get();
    }

    public function render()
    {
        return view('livewire.app.team.index')->extends('layouts.app');
    }
}
