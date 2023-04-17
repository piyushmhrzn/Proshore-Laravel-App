<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrganizationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'email' => 'required|email|unique:organizations,email',
            'description' => 'nullable',
            'address' => 'required|string|max:255',
            'estd_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'designations' => 'nullable'
        ];
    }
}
