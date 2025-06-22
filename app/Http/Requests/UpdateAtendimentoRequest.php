<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtendimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'exists:clientes,id'],
            'servico_id' => ['required', 'exists:servicos,id'],
            'data' => ['required', 'date'],
            'valor_pago' => ['required', 'numeric', 'min:0'],
        ];
    }
}
