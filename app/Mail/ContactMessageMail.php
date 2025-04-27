<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->subject('New Contact Message: ' . $this->contactData['subject'])
                    ->view('emails.contact')
                    ->with([
                        'name' => $this->contactData['name'],
                        'email' => $this->contactData['email'],
                        'phone' => $this->contactData['phone'] ?? 'N/A',
                        'subject' => $this->contactData['subject'],
                        'messageContent' => $this->contactData['message'],
                    ]);
    }
}