<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        dd('ok');
        return [
            'user_email' => ['required', 'email', 'exists:users,email', 'string'],
            'user_password' => ['required', 'min:8', 'string'],
        ];
    }
}
