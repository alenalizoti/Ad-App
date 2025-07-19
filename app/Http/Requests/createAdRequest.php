<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAdRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'condition' => 'required|in:novo,polovno',
            'contact_phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'sometimes|exists:users,id',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
