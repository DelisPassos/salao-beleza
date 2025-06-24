<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:255'],
            'quantidade' => ['required', 'integer', 'min:0'],
            'volume' => ['required', 'string', 'max:20'],
            'preco' => ['required', 'numeric', 'min:0'],
        ];
    }
}
