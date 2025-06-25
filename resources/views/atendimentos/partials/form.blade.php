@php
    $oldServicos = old('servicos', $atendimento?->servicos->map(fn($s) => ['id' => $s->id, 'preco' => $s->pivot->preco])->toArray() ?? []);
    $oldProdutos = old('produtos', $atendimento?->produtos->map(fn($p) => ['id' => $p->id, 'quantidade_usada' => $p->pivot->quantidade_usada])->toArray() ?? []);
@endphp

<div class="row mb-3">
    <div class="col-md-6">
        <x-forms.input-label for="cliente_id" value="Cliente" />
        <select name="cliente_id" id="cliente_id" class="form-select bg-black text-white border-white">
            <option value="">Selecione</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id', $atendimento->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>
        <x-forms.input-error :messages="$errors->get('cliente_id')" class="mt-2 text-white" />
    </div>

    <div class="col-md-6">
        <x-forms.input-label for="profissional_id" value="Profissional" />
        <select name="profissional_id" id="profissional_id" class="form-select bg-black text-white border-white">
            <option value="">-- Selecionar --</option>
            @foreach ($profissionais as $prof)
                <option value="{{ $prof->id }}" {{ old('profissional_id', $atendimento->profissional_id ?? '') == $prof->id ? 'selected' : '' }}>
                    {{ $prof->name }}
                </option>
            @endforeach
        </select>
        <x-forms.input-error :messages="$errors->get('profissional_id')" class="mt-2 text-white" />
    </div>
</div>

<x-forms.input-with-icon
    id="data"
    name="data"
    type="datetime-local"
    icon="calendar-event"
    value="{{ old('data', optional($atendimento?->data)->format('Y-m-d\TH:i')) }}"
    :error="$errors->first('data')"
/>

<x-forms.input-with-icon
    id="valor_pago"
    name="valor_pago"
    type="number"
    step="0.01"
    min="0"
    icon="cash-coin"
    value="{{ old('valor_pago', $atendimento->valor_pago ?? '0.00') }}"
    :error="$errors->first('valor_pago')"
    readonly
/>

<div class="mb-3">
    <x-forms.input-label for="observacoes" value="Observações" />
    <textarea
        name="observacoes"
        id="observacoes"
        rows="3"
        class="form-control bg-black text-white border-white"
    >{{ old('observacoes', $atendimento->observacoes ?? '') }}</textarea>
    <x-forms.input-error :messages="$errors->get('observacoes')" class="mt-2 text-white" />
</div>

{{-- Serviços --}}
@include('atendimentos.partials.servicos', ['servicos' => $servicos, 'oldServicos' => $oldServicos])

{{-- Produtos --}}
@include('atendimentos.partials.produtos', ['produtos' => $produtos, 'oldProdutos' => $oldProdutos])

{{-- Botões já incluídos no componente de formulário --}}

{{-- Script para somar o total dos serviços e atualizar o valor_pago --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const valorPagoInput = document.getElementById('valor_pago');
        const servicosList = document.getElementById('servicos-list');

        function atualizarPrecoTotal() {
            let soma = 0;
            servicosList.querySelectorAll('.servico-preco').forEach(input => {
                const valor = parseFloat(input.value) || 0;
                soma += valor;
            });
            valorPagoInput.value = soma.toFixed(2);
        }

        // Quando um serviço é selecionado, atualiza seu preço automaticamente
        servicosList.addEventListener('change', function (e) {
            if (e.target.classList.contains('servico-select')) {
                const select = e.target;
                const servicoRow = select.closest('.servico-row');
                const precoInput = servicoRow.querySelector('.servico-preco');
                const selectedOption = select.options[select.selectedIndex];
                const preco = selectedOption.dataset.preco ?? 0;
                precoInput.value = preco;
                atualizarPrecoTotal();
            }
        });

        // Inicializa os preços ao carregar a página
        servicosList.querySelectorAll('.servico-select').forEach(select => {
            const precoInput = select.closest('.servico-row').querySelector('.servico-preco');
            const selectedOption = select.options[select.selectedIndex];
            const preco = selectedOption.dataset.preco ?? 0;
            precoInput.value = preco;
        });
        atualizarPrecoTotal();
    });
</script>
@endpush
