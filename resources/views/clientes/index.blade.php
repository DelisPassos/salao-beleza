<x-app-layout>
    <x-layout.header title="Lista de Clientes" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <x-buttons.create-button 
                    href="{{ route('clientes.create') }}" 
                    icon="person-plus-fill" 
                    label="Novo Cliente" 
                />

                {{-- TABELA responsiva para md+ --}}
                <div class="d-none d-md-block">
                    <x-tables.table :headers="['Nome', 'CPF', 'Email', 'Telefone', 'Endereço', 'Ações']">
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><span class="small">{{ $cliente->cpf }}</span></td>
                                <td>{{ $cliente->email }}</td>
                                <td><span class="small">{{ $cliente->telefone }}</span></td>
                                <td>
                                    <span class="small" title="{{ $cliente->endereco }}">
                                        {{ Str::limit($cliente->endereco, 40) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <x-tables.actions 
                                        :editRoute="route('clientes.edit', $cliente)"
                                        :deleteRoute="route('clientes.destroy', $cliente)"
                                        :modalId="'modal-delete-' . $cliente->id"
                                        :itemName="'o cliente ' . $cliente->nome"
                                    />
                                </td>
                            </tr>
                        @empty
                            <x-tables.table-empty colspan="6" message="Nenhum cliente cadastrado." />
                        @endforelse
                    </x-tables.table>
                </div>

                {{-- CARDS responsivos para sm --}}
                <div class="d-block d-md-none">
                    <x-tables.card-view 
                        :items="$clientes"
                        :fields="[
                            'Nome' => 'nome',
                            'CPF' => 'cpf',
                            'Email' => 'email',
                            'Telefone' => 'telefone',
                            'Endereço' => fn($c) => Str::limit($c->endereco, 40),
                        ]"
                        :actions="fn($c) => view('components.tables.actions', [
                            'editRoute' => route('clientes.edit', $c),
                            'deleteRoute' => route('clientes.destroy', $c),
                            'modalId' => 'modal-delete-' . $c->id,
                            'itemName' => 'o cliente ' . $c->nome,
                        ])->render()"
                    />
                </div>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $clientes->links('components.buttons.pagination-button') }}
                </div>
            </x-cards.card-t-privado>

            {{-- Modais de confirmação --}}
            @foreach ($clientes as $cliente)
                <x-modals.confirm-delete 
                    :id="'modal-delete-' . $cliente->id"
                    :route="route('clientes.destroy', $cliente)"
                    :item="'o cliente ' . $cliente->nome"
                />
            @endforeach
        </div>
    </div>
</x-app-layout>
