<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'age' => 'required|min:16|max:30'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute :Không được để trống',
            'email.email' => ':attribute :email :sai định dạng',
            'age.min' => ':attribute :Không được nhỏ hơn :min',
            'age.max' => ':attribute :Không được lớn hơn :max'
        ];
    }
}
