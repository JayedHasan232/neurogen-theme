<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Mail;
use App\Mail\Medicine;
use Livewire\WithFileUploads;

class Pharmacy extends Component
{
    use WithFileUploads;

    // Properties
    public $medicines;
    public $prescription;
    public $name, $phone, $email, $address, $aggreement, $remark;
    public $registered_patient = 'No';
    public $reference = 'No', $employee_name, $employee_id;
    public $payment_method = 'mobile_banking';
    
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

    public function send()
    {
        $validatedDate = $this->validate([
            'medicines' => 'required|array',
            'medicines.*.name' => 'required',
            'medicines.*.quantity' => 'required',
            'medicines.*.unit' => 'required',
            'prescription' => 'nullable|image|max:5120',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'payment_method' => 'required',
        ]);
        
        $data = [
            'medicines' => $this->medicines,
            'prescription' => $this->prescription,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'remark' => $this->remark,
            'registered_patient' => $this->registered_patient,
            'reference' => $this->reference,
            'employee_name' => $this->employee_name,
            'employee_id' => $this->employee_id,
            'payment_method' => $this->payment_method,
        ];

        if($this->aggreement != 'on'){
            return back()->with('warning', 'You should accept the aggreement!');
        }

        Mail::to('jayedhasan232@gmail.com')
            ->send(new Medicine($data));

        $this->reset();
        $this->dataLoader();
        
        return back()->with('success', 'Successfully Submitted!');
    }

    public function render()
    {
        return view('livewire.app.pharmacy')->extends('layouts.app');
    }
}