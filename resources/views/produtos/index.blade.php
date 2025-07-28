<x-app-layout>
    <x-layout.header title="Lista de Produtos" />

    <div class="py-5 bg-black text-white">
        <div class="container">
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

                {{-- TABELA responsiva para md+ --}}
                <div class="d-none d-md-block">
                    <x-tables.table :headers="['Nome', 'Descrição', 'Quantidade', 'Volume/Peso', 'Preço', 'Total', 'Fornecedor', 'Ações']">
                        @forelse($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td><span class="small">{{ $produto->descricao }}</span></td>
                                <td>{{ $produto->quantidade }}</td>
                                <td><span class="small">{{ $produto->volume }}</span></td>
                                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($produto->quantidade * $produto->preco, 2, ',', '.') }}</td>
                                <td><span class="small">{{ $produto->fornecedor->nome ?? '—' }}</span></td>
                                <td class="text-center">
                                    <x-tables.actions 
                                        :editRoute="route('produtos.edit', $produto)"
                                        :deleteRoute="route('produtos.destroy', $produto)"
                                        :modalId="'modal-delete-' . $produto->id"
                                        :itemName="'o produto ' . $produto->nome"
                                    />
                                </td>
                            </tr>
                        @empty
                            <x-tables.table-empty colspan="8" message="Nenhum produto cadastrado." />
                        @endforelse
                    </x-tables.table>
                </div>

                {{-- CARDS responsivos para sm --}}
                <div class="d-block d-md-none">
                    <x-tables.card-view 
                        :items="$produtos"
                        :fields="[
                            'Nome' => 'nome',
                            'Descrição' => 'descricao',
                            'Quantidade' => 'quantidade',
                            'Volume/Peso' => 'volume',
                            'Preço' => fn($p) => 'R$ ' . number_format($p->preco, 2, ',', '.'),
                            'Total' => fn($p) => 'R$ ' . number_format($p->quantidade * $p->preco, 2, ',', '.'),
                            'Fornecedor' => fn($p) => $p->fornecedor->nome ?? '—',
                        ]"
                        :actions="fn($p) => view('components.tables.actions', [
                            'editRoute' => route('produtos.edit', $p),
                            'deleteRoute' => route('produtos.destroy', $p),
                            'modalId' => 'modal-delete-' . $p->id,
                            'itemName' => 'o produto ' . $p->nome,
                        ])->render()"
                    />
                </div>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $produtos->links('components.buttons.pagination-button') }}
                </div>
            </x-cards.card-t-privado>

            {{-- Modais de confirmação --}}
            @foreach ($produtos as $produto)
                <x-modals.confirm-delete 
                    :id="'modal-delete-' . $produto->id"
                    :route="route('produtos.destroy', $produto)"
                    :item="'o produto ' . $produto->nome"
                />
            @endforeach

        </div>
    </div>
</x-app-layout>
