<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterExpensesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'month' => ['nullable', 'date_format:Y-m'],
        ];
    }

    public function messages(): array
    {
        return [
            'month.date_format' => 'Invalid month format.',
        ];
    }
}
