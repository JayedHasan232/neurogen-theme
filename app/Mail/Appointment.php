<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Appointment extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $phone;
    public $email;
    public $date;
    public $message;

    public function __construct($data)
    {
        $this->subject = "Appointment";
        $this->name = $data->name;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->date = $data->date;
        $this->message = $data->message;
    }
    
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject($this->subject)
                    ->markdown('emails.appointment');
    }
}
