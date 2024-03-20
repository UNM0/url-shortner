<?php

namespace App\Http\Requests;

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
        $user = auth()->user();
        return [
            'name' => 'required|string|max:80',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You cannot leave the name field empty',
            'name.max:80' => 'Your name is too long please enter a short name',
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address'
        ];
    }
}
