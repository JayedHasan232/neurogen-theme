<?php

namespace App\Http\Livewire\App\OurTeam;

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

        if($type == 'executive-team'){
            $this->type = 6;
        }elseif($type == 'scientific-advisory-team'){
            $this->type = 7;
        }

        $this->members = Team::where('privacy', 1)
                            ->where('member_type', $this->type)
                            ->orderBy('position', 'asc')
                            ->get();
    }

    public function render()
    {
        return view('livewire.app.our-team.index')->extends('layouts.app');
    }
}

