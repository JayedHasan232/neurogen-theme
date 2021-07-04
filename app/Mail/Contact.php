<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $name;
    public $phone;
    public $email;
    public $message;

    public function __construct($data)
    {
        $this->subject = "Contact Form";
        $this->name = $data->name;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->message = $data->message;
    }
    
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject($this->subject)
                    ->markdown('emails.contact');
    }
}
