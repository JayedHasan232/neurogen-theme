<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Mail;
use App\Mail\Appointment as Appoint;

class Pharmacy extends Component
{
    // Properties
    public $medicines;
    public $prescription, $client_name, $phone, $email, $address, $remark;
    
    public function mount()
    {
        $this->dataLoader();
    }

    public function dataLoader()
    {
        $this->medicines = [
            ['name' => '', 'quantity' => 1, 'unit' => 'strip']
        ];
    }

    public function add()
    {
        $this->medicines[] = ['name' => '', 'quantity' => 1, 'unit' => 'strip'];
    }

    public function remove($row)
    {
        unset($this->medicines[$row]);
        $this->medicines = array_values($this->medicines);
    }

    public function send_pres()
    {
        $validatedDate = $this->validate([
            'medicines' => 'required',
            'medicines.*.name' => 'required',
            'medicines.*.qty' => 'required',
            'medicines.*.unit' => 'required',
            'prescription' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'remark' => 'required',
        ]);
        
        // $data = (object) [
        //     'medicines' => $this->medicines,
        //     'prescription' => $this->prescription,
        //     'name' => $this->name,
        //     'phone' => $this->phone,
        //     'email' => $this->email,
        //     'address' => $this->address,
        //     'remark' => $this->remark,
        // ];

        dd($this->medicines);

        // Mail::to('info@neurogenbd.com')->send(new Appoint($data));

        // $this->reset();
        // $this->dataLoader();
        
        // return back()->with('success', 'Successfully Submitted!');
    }

    public function render()
    {
        return view('livewire.app.pharmacy')->extends('layouts.app');
    }
}
