<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        $validatedData = $request->validated();

        $contactMessage = ContactMessage::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Köszönjük! Az üzenetet sikeresen megkaptuk, hamarosan jelentkezünk.'
        ]);
    }
}
