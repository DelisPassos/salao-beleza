@php
    $index = 0;
@endphp

<div class="mb-4">
    <x-forms.input-label value="Serviços Realizados" />
    <div id="servicos-list">
        @foreach($oldServicos as $servicoData)
            <div class="row align-items-center mb-2">
                <div class="col-md-7">
                    <select name="servicos[{{ $index }}][id]" class="form-select bg-black text-white border-warning">
                        @foreach ($servicos as $servico)
                            <option value="{{ $servico->id }}" {{ $servico->id == $servicoData['id'] ? 'selected' : '' }}>
                                {{ $servico->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="number"
                           name="servicos[{{ $index }}][preco]"
                           step="0.01"
                           min="0"
                           class="form-control bg-black text-white border-warning"
                           placeholder="Preço"
                           value="{{ $servicoData['preco'] }}">
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

{{-- Script para adicionar/remover serviços --}}
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let servicosIndex = {{ $index }};
                const servicosList = document.getElementById('servicos-list');

                document.getElementById('add-servico').addEventListener('click', function () {
                    const html = `
                        <div class="row align-items-center mb-2">
                            <div class="col-md-7">
                                <select name="servicos[${servicosIndex}][id]" class="form-select bg-black text-white border-warning">
                                    @foreach ($servicos as $servico)
                                        <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="servicos[${servicosIndex}][preco]" step="0.01" min="0"
                                    class="form-control bg-black text-white border-warning" placeholder="Preço">
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
                        e.target.closest('.row').remove();
                    }
                });
            });
        </script>
    @endpush
@endonce
