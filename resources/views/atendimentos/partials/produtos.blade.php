@php
    $index = 0;
@endphp

<div class="mb-4">
    <x-forms.input-label value="Produtos Usados" />
    <div id="produtos-list">
        @foreach($oldProdutos as $produtoData)
            <div class="row align-items-center mb-2">
                <div class="col-md-7">
                    <select name="produtos[{{ $index }}][id]" class="form-select bg-black text-white border-white">
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}" {{ $produto->id == $produtoData['id'] ? 'selected' : '' }}>
                                {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="number"
                           name="produtos[{{ $index }}][quantidade_usada]"
                           min="1"
                           class="form-control bg-black text-white border-white"
                           placeholder="Quantidade"
                           value="{{ $produtoData['quantidade_usada'] }}">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-produto">×</button>
                </div>
            </div>
            @php $index++; @endphp
        @endforeach
    </div>
    <button type="button" id="add-produto" class="btn btn-warning btn-sm mt-2">Adicionar Produto</button>
</div>

{{-- Script para adicionar/remover produtos --}}
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let produtosIndex = {{ $index }};
                const produtosList = document.getElementById('produtos-list');

                document.getElementById('add-produto').addEventListener('click', function () {
                    const html = `
                        <div class="row align-items-center mb-2">
                            <div class="col-md-7">
                                <select name="produtos[${produtosIndex}][id]" class="form-select bg-black text-white border-white">
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="produtos[${produtosIndex}][quantidade_usada]" min="1"
                                    class="form-control bg-black text-white border-white" placeholder="Quantidade">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-sm remove-produto">×</button>
                            </div>
                        </div>
                    `;
                    produtosList.insertAdjacentHTML('beforeend', html);
                    produtosIndex++;
                });

                produtosList.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-produto')) {
                        e.target.closest('.row').remove();
                    }
                });
            });
        </script>
    @endpush
@endonce
