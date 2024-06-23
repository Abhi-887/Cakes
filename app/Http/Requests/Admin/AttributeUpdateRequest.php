<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeUpdateRequest extends FormRequest
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
        $rules = [
            'title' => 'max:255',
            'input_type' => 'integer',
            'is_required' => 'numeric',
            'short_order' => 'nullable|numeric',
            'option_description' => 'nullable',
            'product_id' => 'nullable|integer',
        ];

        // Check if attribute list is present
        if ($this->has('m') && is_array($this->input('m'))) {
            foreach ($this->input('m') as $index => $attributeData) {
                if (isset($attributeData['list'])) {
                    foreach ($attributeData['list'] as $optionIndex => $optionData) {
                        // Add validation rules for attribute options
                        $rules["m.$index.list.$optionIndex.title"] = 'max:255';
                        $rules["m.$index.list.$optionIndex.price"] = 'nullable|numeric';
                        $rules["m.$index.list.$optionIndex.price_type"] = 'nullable|integer';
                        $rules["m.$index.list.$optionIndex.sku"] = 'nullable|string|max:255';
                        $rules["m.$index.list.$optionIndex.default_se"] = 'nullable|boolean';
                        $rules["m.$index.list.$optionIndex.short_order"] = 'nullable|numeric';
                    }
                }
            }
        }

        return $rules;
    }
}
