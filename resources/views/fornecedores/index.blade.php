<x-app-layout>
    <x-layout.header title="Lista de Fornecedores" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <div class="mb-3">
                    <x-buttons.create-button
                        href="{{ route('fornecedores.create') }}"
                        icon="person-plus"
                        label="Novo Fornecedor"
                    />
                </div>

                {{-- Tabela --}}
                <x-tables.table :headers="['Nome', 'CNPJ', 'Telefone', 'E-mail', 'Ações']">
                    @forelse($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                            <td>{{ $fornecedor->telefone ?: '—' }}</td>
                            <td>{{ $fornecedor->email ?: '—' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botão Editar --}}
                                    <a href="{{ route('fornecedores.edit', $fornecedor) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir --}}
                                    <x-buttons.delete-button
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal-delete-{{ $fornecedor->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                {{-- Modal de Confirmação --}}
                                <x-modals.confirm-delete
                                    id="modal-delete-{{ $fornecedor->id }}"
                                    route="{{ route('fornecedores.destroy', $fornecedor) }}"
                                    item="o fornecedor {{ $fornecedor->nome }}"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="5" message="Nenhum fornecedor cadastrado." />
                    @endforelse
                </x-tables.table>
                {{-- Paginação --}}
                {{ $fornecedores->links('components.buttons.pagination-button') }}
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
