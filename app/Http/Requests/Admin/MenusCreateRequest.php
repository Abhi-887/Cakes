<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenusCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust as per your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'parentmenu' => 'nullable|exists:menus,id', // Example of existing menu validation
            'status' => 'required|boolean',
        ];
    }
}
