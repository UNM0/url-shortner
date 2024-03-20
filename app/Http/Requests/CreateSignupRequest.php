<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSignupRequest extends FormRequest
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
            'name' => 'required|string|max:90',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name!',
            'email.required' => 'Please enter your email to signup!',
            'email.email' => 'Please enter a valid email to signup!',
            'password.required' => 'Please set a password for your account!',
            'password.max:15' => 'Your password is too long!',
            'password.min:6' => 'Your password is too short!',
            'password.confirmed' => 'Your passwords does not match!',
            'password_confirmation.required' => 'Please confirm your password!',
        ];
    }
}
