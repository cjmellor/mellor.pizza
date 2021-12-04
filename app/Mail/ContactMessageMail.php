<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessageMail extends Mailable
{
    public function __construct(protected $data)
    {
    }

    public function build(): self
    {
        return $this->markdown('emails.contact-message')
            ->with([
                'name' => $this->data['contact_name'],
                'message' => $this->data['contact_message'],
            ])
            ->subject(config('mail.subject'))
            ->replyTo($this->data['contact_email']);
    }
}
