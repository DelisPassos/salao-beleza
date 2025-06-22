<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtendimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'exists:clientes,id'],
            'servicos' => ['required', 'array', 'min:1'],
            'servicos.*' => ['exists:servicos,id'],
            'data' => ['required', 'date'],
            'valor_pago' => ['required', 'numeric', 'min:0'],
        ];
    }
}
