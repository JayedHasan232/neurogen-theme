<?php

namespace App\Http\Livewire\App;

use Storage;
use Livewire\Component;
use Mail;
use App\Mail\Medicine;
use App\Models\SiteInfo as Info;
use App\Models\Medicine as MedicineData;
use Livewire\WithFileUploads;

class Pharmacy extends Component
{
    use WithFileUploads;

    // Properties
    public $info;
    public $medicines_data;

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
        $this->info = Info::find(1);
        $this->medicines_data = MedicineData::all();

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

        if($this->aggreement != 'on'){
            return back()->with('warning', 'You should accept the aggreement!');
        }
        
        // Storing image temporarily
        $prescription = $this->prescription->store('images/email_temp');

        $data = [
            'medicines' => $this->medicines,
            'prescription' => $prescription,
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

        Mail::to($info->pharmacy_email)->send(new Medicine($data));

        // Deleting temporarily stored image
        Storage::delete($prescription);

        $this->reset();
        $this->dataLoader();
        
        return back()->with('success', 'Successfully Submitted!');
    }

    public function render()
    {
        return view('livewire.app.pharmacy')->extends('layouts.app');
    }
}
