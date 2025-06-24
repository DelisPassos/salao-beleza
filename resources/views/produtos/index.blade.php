<x-app-layout>
    <x-layout.header title="Lista de Produtos" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            {{-- Cartão padrão privado --}}
            <x-cards.card-t-privado>

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
                <x-tables.table :headers="['Nome', 'Descrição', 'Quantidade', 'Volume/Peso', 'Preço', 'Total', 'Ações']">
                    @forelse($produtos as $p)
                        <tr>
                            <td>{{ $p->nome }}</td>
                            <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $p->descricao }}">
                                {{ $p->descricao }}
                            </td>
                            <td>{{ $p->quantidade }}</td>
                            <td>{{ $p->volume }}</td>
                            <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($p->quantidade * $p->preco, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Botão Editar --}}
                                    <a href="{{ route('produtos.edit', $p->id) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir com modal --}}
                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $p->id }}">
                                        Excluir
                                    </x-buttons.delete-button>

                                    {{-- Modal de confirmação --}}
                                    <x-modals.confirm-delete 
                                        id="modal-delete-{{ $p->id }}"
                                        route="{{ route('produtos.destroy', $p->id) }}"
                                        item="o produto {{ $p->nome }}"
                                    />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="7" message="Nenhum produto cadastrado." />
                    @endforelse
                </x-tables.table>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>