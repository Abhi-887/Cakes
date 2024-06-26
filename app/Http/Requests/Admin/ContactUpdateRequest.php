<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone_one' => ['nullable'],
            'phone_two' => ['nullable'],
            'mail_one' => ['nullable', 'max:255'],
            'mail_two' => ['nullable', 'max:255'],
            'address' => ['nullable'],
            'map_link' => ['nullable'],
        ];
    }
}
