<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => '',
            'email' => 'email|unique:users',
            'password' => '',
            'phone' => 'unique:users|min:10|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute :Không được để trống',
            'email.email' => ':attribute :sai định dạng',
            'email.unique' => ':attribute : đã được sử dụng',
            'phone.unique' => ':attribute : đã được sử dụng',
            'phone.min' => ':attribute :Không được ít hơn :min kí tự',
            'phone.max' => ':attribute :Không được nhiều hơn :max kí tự'
        ];
    }
}
