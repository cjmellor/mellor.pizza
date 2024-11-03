<?php

namespace App\Http\Livewire;

use App\Mail\ContactMessageMail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class ContactPopup extends Component
{
    use WithHoney;

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

    public function updated($propertyName)
    {
        $this->validateOnly(field: $propertyName);
    }

    public function send(): void
    {
        $validated = $this->validate();

        if ($this->honeyPasses() === false) {
            $this->dispatch(
                event: 'send-toast',
                messageContent: 'Something went wrong!',
                type: 'error',
            );

            return;
        }

        Mail::to(users: config(key: 'mail.current_contact_email'))
            ->send(new ContactMessageMail($validated));

        sleep(seconds: 1);

        $this->dispatch(
            event: 'send-toast',
            messageContent: 'Message sent!',
        );

        $this->showContactMePopUp = false;

        $this->reset();
    }

    public function closePopUp()
    {
        $this->resetValidation();

        $this->showContactMePopUp = false;
    }

    public function render(): View
    {
        return view('livewire.contact-popup');
    }
}
