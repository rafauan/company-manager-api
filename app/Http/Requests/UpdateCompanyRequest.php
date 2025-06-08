<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255|unique:companies,name,' . $this->route('company')->id,
            'nip' => [
                'sometimes',
                'required',
                'string',
                'regex:/^\d{10}$/',
                'unique:companies,nip,' . $this->route('company')->id,
            ],
            'address' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:100',
            'zip_code' => 'sometimes|required|string|max:10',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'nip.regex' => 'The NIP must be exactly 10 digits.',
        ];
    }
}
