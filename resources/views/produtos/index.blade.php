<x-app-layout>
    <x-layout.header title="Lista de Produtos" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            {{-- Cartão padrão privado --}}
            <x-cards.card-t-privado>

                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criar novo produto --}}
                <x-buttons.create-button 
                    href="{{ route('produtos.create') }}" 
                    icon="plus" 
                    label="Novo Produto" 
                />

                {{-- Tabela de produtos --}}
                <x-tables.table :headers="['Nome', 'Descrição', 'Quantidade', 'Volume/Peso', 'Preço', 'Total', 'Fornecedor', 'Ações']">
                    @forelse($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $produto->descricao }}">
                                {{ $produto->descricao }}
                            </td>
                            <td>{{ $produto->quantidade }}</td>
                            <td>{{ $produto->volume }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($produto->quantidade * $produto->preco, 2, ',', '.') }}</td>
                            <td>{{ $produto->fornecedor->nome ?? '—' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Botão Editar --}}
                                    <a href="{{ route('produtos.edit', $produto->id) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir com modal --}}
                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $produto->id }}">
                                        Excluir
                                    </x-buttons.delete-button>

                                    {{-- Modal de confirmação --}}
                                    <x-modals.confirm-delete 
                                        id="modal-delete-{{ $produto->id }}"
                                        route="{{ route('produtos.destroy', $produto->id) }}"
                                        item="o produto {{ $produto->nome }}"
                                    />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="8" message="Nenhum produto cadastrado." />
                    @endforelse
                </x-tables.table>

                {{-- Paginação --}}
                {{ $produtos->links('components.buttons.pagination-button') }}
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
