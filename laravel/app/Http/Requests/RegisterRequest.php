<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => ['required', 'max:100', 'string'],
            'user_email' => ['required', 'max: 255', 'string', 'email', 'unique:users,email'],
            'user_password' => ['required', 'min:8', 'string', 'confirmed'],
            'user_password_confirmation' => ['required', 'min:8', 'string'],
            'user_is_remember' => [],
        ];
    }
}
