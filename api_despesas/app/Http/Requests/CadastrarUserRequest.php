<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome precisa ser uma string.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'A email deve ser válido.',
            'email.unique' => 'O email utilizado já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha precisa ser uma string.',
            'password.confirmed' => 'A senha precisa ser confirmada.'
        ];
    }
}
