<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinColocationRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required|string|exists:colocations,join_token',
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'Please enter a join token.',
            'token.exists' => 'This join token is invalid.',
        ];
    }
}
