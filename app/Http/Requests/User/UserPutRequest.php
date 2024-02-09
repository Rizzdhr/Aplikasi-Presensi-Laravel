<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPutRequest extends FormRequest
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
            'guru_id' => ['required', Rule::unique('users', 'guru_id')->ignore($this->user['id'])],
            'roles' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->user['id'])],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }
}
