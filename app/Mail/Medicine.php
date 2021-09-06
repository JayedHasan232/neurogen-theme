<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Medicine extends Mailable
{
    use Queueable, SerializesModels;

    // Properties
    public $medicines;
    public $name, $phone, $email, $address, $aggreement, $remark;
    public $registered_patient;
    public $reference, $employee_name, $employee_id;
    public $payment_method;

    public function __construct($data)
    {
        $this->medicines = $data['medicines'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->remark = $data['remark'];
        $this->registered_patient = $data['registered_patient'];
        $this->reference = $data['reference'];
        $this->employee_name = $data['employee_name'];
        $this->employee_id = $data['employee_id'];
        $this->payment_method = $data['payment_method'];
    }
    
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject("Pharmacy: medicine")
                    ->markdown('emails.medicine');
    }
}
