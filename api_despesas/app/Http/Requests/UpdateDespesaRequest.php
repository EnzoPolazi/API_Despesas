<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDespesaRequest extends FormRequest
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
            'descricao' => 'string|max:191',
            'data' => 'date|before_or_equal:now',
            'valor' => 'decimal:2|gt:0'
        ];
    }

    public function messages(): array
    {
        return[
            'descricao.string' => 'A descrição precisa ser uma string.',
            'descricao.max' => 'A descrição tem um limite de 191 caracteres.',
            'data.date' => 'A data precisa ter um formato válido.',
            'data.before_or_equal' => 'A data não pode estar no futuro.',
            'valor.decimal' => 'O valor deve ser um número com 2 casas decimais.',
            'valor.gt' => 'O valor deve ser maior que 0'
        ];
    }
}
