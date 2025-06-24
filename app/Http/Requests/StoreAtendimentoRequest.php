<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtendimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Altere se tiver regras de autorização
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'exists:clientes,id'],
            'profissional_id' => ['nullable', 'exists:users,id'],
            'data' => ['required', 'date'],
            'valor_pago' => ['required', 'numeric', 'min:0'],
            'observacoes' => ['nullable', 'string'],

            'servicos' => ['required', 'array'],
            'servicos.*.id' => ['required', 'exists:servicos,id'],
            'servicos.*.preco' => ['required', 'numeric', 'min:0'],

            'produtos' => ['nullable', 'array'],
            'produtos.*.id' => ['required', 'exists:produtos,id'],
            'produtos.*.quantidade_usada' => ['required', 'integer', 'min:1'],
        ];
    }
}
