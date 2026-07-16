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
}
