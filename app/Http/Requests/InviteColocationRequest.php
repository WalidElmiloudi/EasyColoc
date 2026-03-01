<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteColocationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:colocation_invitations,email',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'An invitation has already been sent to this email.',
        ];
    }
}
