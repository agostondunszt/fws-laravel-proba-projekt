<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ContactService;

class ContactModal extends Component
{
    public $show = false;
    public $name, $email, $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit(ContactService $service) {
        $data = $this->validate();
        $service->process($data);
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.contact-modal');
    }
    protected function messages()
    {
        return [
            'name.required' => 'Kérlek, add meg a neved.',
            'name.min' => 'A név legalább 3 karakter hosszú legyen.',
            'email.required' => 'Az email cím megadása kötelező.',
            'email.email' => 'Érvénytelen email formátum.',
            'message.required' => 'Kérlek, írj egy üzenetet.',
            'message.min' => 'Az üzenet túl rövid.',
        ];
    }
}
