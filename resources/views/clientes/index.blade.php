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

                {{-- Tabela responsiva --}}
                <x-tables.table :headers="['Nome', 'CPF', 'Email', 'Telefone', 'Endereço', 'Ações']">
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>
                                <div class="text-truncate" style="max-width: 150px;" title="{{ $cliente->endereco }}">
                                    {{ $cliente->endereco }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    {{-- Botão Editar --}}
                                    <a href="{{ route('clientes.edit', $cliente) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir --}}
                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $cliente->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                {{-- Modal de Confirmação --}}
                                <x-modals.confirm-delete 
                                    id="modal-delete-{{ $cliente->id }}"
                                    route="{{ route('clientes.destroy', $cliente) }}"
                                    :item="$cliente->nome"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="6" message="Nenhum cliente cadastrado." />
                    @endforelse
                </x-tables.table>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $clientes->links('components.buttons.pagination-button') }}
                </div>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
