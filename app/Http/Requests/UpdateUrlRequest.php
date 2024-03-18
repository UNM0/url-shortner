<?php

namespace App\Http\Requests;

use App\Models\Url;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $url_id = $this->route()->id;
        $url = Url::findOrFail($url_id);

        return $url->user_id == auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // if ($this->method() != 'GET') {
        //     return [
        //         'title' => 'nullable|string',
        //         'shortened_url' => 'required|string',
        //     ];
        // }
        // return [];
        if ($this->method == 'POST') {
            return [
                'title' => 'nullable|string',
                'shortened_url' => 'required|string',
            ];
        }
        return [];
        // if ($this->method == 'GET') {
        //     return [
        //         'title' => 'nullable|string',
        //         'shortened_url' => 'required|string',
        //     ];
        // }
        // return [];
    }
    public function messages()
    {
        return [
            'shortened_url.required' => 'Please name your URL with a valid name !',
        ];
    }
}
