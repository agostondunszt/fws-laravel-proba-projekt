<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request, ContactService $service)
    {
        $service->process($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Köszönjük! Az üzenetet sikeresen megkaptuk.'
        ]);
    }
}
