<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50', 'unique:coupons,code,' . $this->route('coupon')],
            'quantity' => ['required', 'integer', 'min:1'],
            'min_purchase_amount' => ['nullable', 'numeric', 'min:0'],
            'max_uses_per_user' => ['nullable', 'integer', 'min:1'],
            'start_date' => ['required', 'date', 'before_or_equal:expire_date'],
            'expire_date' => ['required', 'date', 'after_or_equal:start_date'],
            'discount_type' => ['required', 'in:percent,amount'],
            'discount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'boolean'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'sub_category_id' => ['nullable', 'exists:categories,id'],
            'product_ids' => ['nullable', 'array'],
            'product_ids.*' => ['exists:products,id'],
            // Custom validation rule for either category or products
            'category_id' => ['nullable', function ($attribute, $value, $fail) {
                if ($value && $this->input('product_ids')) {
                    $fail('You cannot apply the coupon to both a category and specific products.');
                }
            }],
            'product_ids' => ['nullable', function ($attribute, $value, $fail) {
                if ($value && $this->input('category_id')) {
                    $fail('You cannot apply the coupon to both specific products and a category.');
                }
            }],
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The coupon name is required.',
            'code.required' => 'The coupon code is required.',
            'code.unique' => 'The coupon code must be unique.',
            'quantity.required' => 'The coupon quantity is required.',
            'quantity.min' => 'The coupon quantity must be at least 1.',
            'min_purchase_amount.numeric' => 'The minimum purchase amount must be a number.',
            'min_purchase_amount.min' => 'The minimum purchase amount cannot be less than 0.',
            'max_uses_per_user.integer' => 'The maximum uses per user must be an integer.',
            'max_uses_per_user.min' => 'The maximum uses per user must be at least 1.',
            'start_date.before_or_equal' => 'The start date must be before or equal to the expiry date.',
            'expire_date.after_or_equal' => 'The expiry date must be after or equal to the start date.',
            'discount_type.required' => 'The discount type is required.',
            'discount_type.in' => 'The discount type must be either percent or fixed.',
            'discount.required' => 'The discount amount is required.',
            'discount.min' => 'The discount amount cannot be less than 0.',
            'status.required' => 'The coupon status is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'sub_category_id.exists' => 'The selected subcategory is invalid.',
            'product_ids.array' => 'The product IDs must be an array.',
            'product_ids.*.exists' => 'One or more selected products are invalid.',
        ];
    }
}
