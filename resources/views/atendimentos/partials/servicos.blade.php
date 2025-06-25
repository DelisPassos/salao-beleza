@php
    $index = 0;
@endphp

<div class="mb-4">
    <x-forms.input-label value="Serviços Realizados" />
    <div id="servicos-list">
        @foreach($oldServicos as $servicoData)
            <div class="row align-items-center mb-2 servico-row" data-index="{{ $index }}">
                <div class="col-md-7">
                    <select name="servicos[{{ $index }}][id]" class="form-select bg-black text-white border-white servico-select">
                        <option value="">-- Selecione --</option>
                        @foreach ($servicos as $servico)
                            <option value="{{ $servico->id }}" data-preco="{{ $servico->preco }}" {{ $servico->id == $servicoData['id'] ? 'selected' : '' }}>
                                {{ $servico->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    {{-- Campo preço unitário (readonly) --}}
                    <input type="number"
                           name="servicos[{{ $index }}][preco]"
                           step="0.01"
                           min="0"
                           class="form-control bg-black text-white border-white servico-preco"
                           placeholder="Preço"
                           value="{{ $servicoData['preco'] }}"
                           readonly>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-servico">×</button>
                </div>
            </div>
            @php $index++; @endphp
        @endforeach
    </div>
    <button type="button" id="add-servico" class="btn btn-warning btn-sm mt-2">Adicionar Serviço</button>
</div>

{{-- Script para atualizar preço e somar total --}}
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let servicosIndex = {{ $index }};
                const servicosList = document.getElementById('servicos-list');
                const valorPagoInput = document.querySelector('input[name="valor_pago"]');

                function atualizarPrecoUnitario(select) {
                    const servicoRow = select.closest('.servico-row');
                    const precoInput = servicoRow.querySelector('.servico-preco');
                    const selectedOption = select.options[select.selectedIndex];
                    const preco = selectedOption.dataset.preco ?? 0;
                    precoInput.value = preco;
                    atualizarPrecoTotal();
                }

                function atualizarPrecoTotal() {
                    let soma = 0;
                    servicosList.querySelectorAll('.servico-preco').forEach(input => {
                        const valor = parseFloat(input.value) || 0;
                        soma += valor;
                    });
                    if (valorPagoInput) {
                        valorPagoInput.value = soma.toFixed(2);
                    }
                }

                servicosList.addEventListener('change', function (e) {
                    if (e.target.classList.contains('servico-select')) {
                        atualizarPrecoUnitario(e.target);
                    }
                });

                document.getElementById('add-servico').addEventListener('click', function () {
                    const html = `
                        <div class="row align-items-center mb-2 servico-row" data-index="${servicosIndex}">
                            <div class="col-md-7">
                                <select name="servicos[${servicosIndex}][id]" class="form-select bg-black text-white border-white servico-select">
                                    <option value="">-- Selecione --</option>
                                    @foreach ($servicos as $servico)
                                        <option value="{{ $servico->id }}" data-preco="{{ $servico->preco }}">{{ $servico->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number"
                                       name="servicos[${servicosIndex}][preco]"
                                       step="0.01"
                                       min="0"
                                       class="form-control bg-black text-white border-white servico-preco"
                                       placeholder="Preço"
                                       readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-sm remove-servico">×</button>
                            </div>
                        </div>
                    `;
                    servicosList.insertAdjacentHTML('beforeend', html);
                    servicosIndex++;
                });

                servicosList.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-servico')) {
                        e.target.closest('.servico-row').remove();
                        atualizarPrecoTotal();
                    }
                });

                // Inicializa valores ao carregar a página
                servicosList.querySelectorAll('.servico-select').forEach(select => {
                    atualizarPrecoUnitario(select);
                });
            });
        </script>
    @endpush
@endonce
