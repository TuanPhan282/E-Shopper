<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
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
            'name' => 'required|max:25',
            'phoneNumber' => 'required|min:10|max:10',
            'age' => 'required|integer|min:16|max:30',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name' => 'required|max:25',
    //         'phoneNumber' => 'required|min:10|max:10',
    //         'age' => 'required|integer|min:16|max:30',
    //     ];
    // }
}
