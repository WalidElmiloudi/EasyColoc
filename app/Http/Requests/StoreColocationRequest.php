<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColocationRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:colocations,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The colocation name is required.',
            'name.unique' => 'A colocation with this name already exists.',
        ];
    }

}
