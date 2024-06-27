<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Contact2UpdateRequest extends FormRequest
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
            'phone_one' => ['nullable', 'string', 'max:255'],
            'phone_two' => ['nullable', 'string', 'max:255'],
            'mail_one' => ['nullable', 'email', 'max:255'],
            'mail_two' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'map_link' => ['nullable', 'url'],
            'title_one' => ['nullable', 'string', 'max:255'],
            'description_one' => ['nullable', 'string'],
            'title_two' => ['nullable', 'string', 'max:255'],
            'description_two' => ['nullable', 'string'],
            'title_three' => ['nullable', 'string', 'max:255'],
            'description_three' => ['nullable', 'string'],
            'main_description' => ['nullable', 'string'],
            'phone_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
