<?php

namespace App\Services;

use App\Models\ContactMessage;
use App\Events\ContactFormSubmitted;

class ContactService {
    public function process(array $data) {
        $message = ContactMessage::create($data);
        event(new ContactFormSubmitted($data));
        return $message;
    }
}