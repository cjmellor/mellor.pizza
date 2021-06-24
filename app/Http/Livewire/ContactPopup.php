<?php

namespace App\Http\Livewire;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactPopup extends Component
{
    public string $contact_name = '';
    public string $contact_email = '';
    public string $contact_message = '';
    public bool $sent = false;
    public bool $showContactMePopUp = false;

    protected $listeners = ['messageSent'];

    protected array $rules = [
        'contact_name' => 'required|min:3|max:50',
        'contact_email' => 'required|email:rfc,dns',
        'contact_message' => 'required',
    ];

    protected array $validationAttributes = [
        'contact_name' => 'name',
        'contact_email' => 'email',
        'contact_message' => 'message',
    ];

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validated = $this->validate();

        Mail::to(users: config(key: 'mail.current_contact_email'))
            ->send(new ContactMessageMail($validated));

        sleep(seconds: 1);

        $this->dispatchBrowserEvent('send-toast', [
            'messageContent' => 'Message sent!',
        ]);

        $this->showContactMePopUp = false;
    }

    public function render()
    {
        return view('livewire.contact-popup');
    }
}
