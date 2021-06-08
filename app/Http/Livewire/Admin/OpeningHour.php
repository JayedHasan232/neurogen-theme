<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\OpeningHour as OfficeTime;

class OpeningHour extends Component
{
    public $privacy = 1;
    public $day;
    public $from;
    public $to;

    protected $rules = [
        'privacy' => 'required',
        'day' => 'required',
        'from' => 'required',
        'to' => 'required',
    ];

    public function store()
    {
        $this->validate();

        OfficeTime::create([
            'privacy' => $this->privacy,
            'day' => $this->day,
            'from' => $this->from,
            'to' => $this->to,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.opening-hour')->extends('layouts.admin');
    }
}
