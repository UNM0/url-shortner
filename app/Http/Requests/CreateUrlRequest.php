<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'orignal_url' => 'required|url',
        ];
    }
    public function messages()
    {
        return [
            'orignal_url.required' => 'Please provide us with a Url to make it short for you',
            'orignal_url.url' => 'The URL you have provided is not a valid URL, Please use a valid URL !',
        ];
    }
}
