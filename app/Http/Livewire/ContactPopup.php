<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactPopup extends Component
{
    public $contact_name;
    public $contact_email;
    public $contact_message;
    public $sending = false;
    public $sent = false;
    public $showContactMePopUp = false;

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
        $this->validate();

        $this->sent = true;
        /*TODO: Send email logic here*/

        sleep(seconds: 3);

        $this->showContactMePopUp = false;
    }

    public function render()
    {
        return view('livewire.contact-popup');
    }
}
