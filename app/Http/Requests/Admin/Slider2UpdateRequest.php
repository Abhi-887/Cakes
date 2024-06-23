<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Slider2UpdateRequest extends FormRequest
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
			'category_id' =>['required'],
            'image' => ['nullable', 'image', 'max:3000'],
            'offer' => ['nullable', 'string', 'max:50'],
            'title' => ['max:255'],
            'sub_title' => ['max:255'],
            'short_description' => ['max:255'],
            'button_link' => ['nullable', 'max:255'],
            'status' => ['boolean']
        ];
    }
}
