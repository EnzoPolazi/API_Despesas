<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDespesaRequest extends FormRequest
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
            'descricao' => 'required|string|max:191',
            'data' => 'required|date|before_or_equal:now',
            'id_usuario' => 'required|exists:users,id',
            'valor' => 'required|decimal:2|gt:0'
        ];
    }

    public function messages(): array
    {
        return[
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string' => 'A descrição precisa ser uma string.',
            'descricao.max' => 'A descrição tem um limite de 191 caracteres.',
            'data.required' => 'A data é obrigatória.',
            'data.date' => 'A data precisa ter um formato válido.',
            'data.before_or_equal' => 'A data não pode estar no futuro.',
            'id_usuario.required' => 'O id do usuário é obrigatório.',
            'id_usuario.existis' => 'Id de usuário não encontrado.',
            'valor.required' => 'O valor é obrigatório.',
            'valor.decimal' => 'O valor deve ser um número com 2 casas decimais.',
            'valor.gt' => 'O valor deve ser maior que 0'
        ];
    }
}
