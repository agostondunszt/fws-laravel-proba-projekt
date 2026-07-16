<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Kérlek, add meg a neved.',
            'name.string' => 'A névnek szöveget kell tartalmaznia.',
            'name.max' => 'A név túl hosszú.',
            'email.required' => 'Az email cím megadása kötelező.',
            'email.email' => 'Érvénytelen email formátum.',
            'message.required' => 'Kérlek, írj egy üzenetet.',
            'message.string' => 'Az üzenetnek szöveget kell tartalmaznia.',
            'message.max' => 'Az üzenet túl hosszú.'
        ];
    }
}
