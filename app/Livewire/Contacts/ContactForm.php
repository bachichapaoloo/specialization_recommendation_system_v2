<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactForm extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $message;
    public $formSubmitted = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Clear form fields after submission
        $this->reset('name', 'email', 'message');

        $this->formSubmitted = true;

        // Add a success message with a redirect callback
        $this->flash('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'text' => 'Message Successfully Sent!',
        ]);
        return redirect()->to('/contact');
    }

    public function render()
    {
        return view('livewire.contacts.contact-form');
    }
}
