<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required' , 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d'],
            'phone'=>['required','numeric','digits:11'],
            'image'=>[$this->isMethod('POST') ? 'required' : 'nullable', 'image', 'mimes:png,jpg', 'max:5120'], //5MB
        ];
    }
}
