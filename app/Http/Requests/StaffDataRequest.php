<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customerdetail|max:255',
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'phoneno' => 'required|string|max:10'
        ];
    }
}
