<?php

namespace App\Http\Livewire\App\Gallery;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Gallery as Item;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $identifier;

    public $totalItems;
    public $initialQty = 6;
    public $qty = 6;

    public function mount($identifier = 'images')
    {
        $this->identifier = $identifier;

        $itemType = ($identifier == 'images') ? 1 : 2;
        $this->totalItems = Item::where('privacy', 1)->where('type', $itemType)->count();
    }

    public function loadMore()
    {
        $this->qty += $this->initialQty;
    }

    public function render()
    {

        if($this->identifier == 'images'){
            $items = Item::where('privacy', 1)->where('type', 1)
                        ->latest()
                        ->paginate($this->qty);
        }else{
            $items = Item::where('privacy', 1)->where('type', 2)
                        ->latest()
                        ->paginate($this->qty);
        }

        return view('livewire.app.gallery.index', ['items' => $items])->extends('layouts.app');
    }
}
