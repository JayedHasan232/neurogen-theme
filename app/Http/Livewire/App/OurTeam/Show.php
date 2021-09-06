<?php

namespace App\Http\Livewire\App\OurTeam;

use Livewire\Component;

use App\Models\Team;
use App\Models\SiteInfo as Info;

class Show extends Component
{
    public $member_type;
    public $type;
    public $member;
    public $info;

    public function mount($type, $url)
    {
        $this->member_type = $type;

        if($type == 'executive-team'){
            $this->type = 6;
        }else{
            $this->type = 7;
        }

        $this->member = Team::where('privacy', 1)->where('url', $url)->firstOrFail();
        $this->info = Info::find(1);
    }

    public function render()
    {
        return view('livewire.app.our-team.show')->extends('layouts.app');
    }
}
