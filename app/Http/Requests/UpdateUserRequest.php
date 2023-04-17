<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        // dd($this->employee);
        // $employeId = request()->route()->parameter("employee");

        return [
            'name' => 'required|string|max:255',
            'email' => [
                "string","email","required",
                // "unique:users,email,".$this->employee,
                Rule::unique("users")->ignore($this->employee)
            ],
            'designation' => 'required|string'
        ];
    }
}
