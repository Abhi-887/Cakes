<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image' => [ 'image', 'max:3000'],
            'name' => [ 'max:255'],
            'category' => [ 'integer'],
            'price' => [ 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'quantity' => [ 'numeric'],
            'short_description' => [ 'max:500'],
            'long_description' => ['required'],
            'sku' => ['nullable', 'max:255'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_description' => ['nullable', 'max:255'],
            'show_at_home' => ['boolean'],
            'status' => ['boolean']
        ];
    }
}
