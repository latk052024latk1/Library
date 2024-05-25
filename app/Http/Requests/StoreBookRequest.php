<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            //
            'title' => 'required|string|max:50',
            'desc' => 'required|string|max:200',
            'pages' => 'nullable|integer|min:1|max:'.(pow(2,16)-1)
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'desc.required'  => 'The desc field is required.'
        ];
    }
}
