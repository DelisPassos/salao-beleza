<x-app-layout>
    <x-layout.header title="Lista de Atendimentos" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            <x-cards.card-t-privado>
                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <x-buttons.create-button 
                    href="{{ route('atendimentos.create') }}" 
                    icon="calendar-plus" 
                    label="Novo Atendimento" 
                />

                {{-- Tabela de atendimentos --}}
                <x-tables.table :headers="['Cliente', 'Profissional', 'Serviços', 'Produtos', 'Data', 'Valor', 'Ações']">
                    @forelse($atendimentos as $atendimento)
                        <tr>
                            {{-- Cliente --}}
                            <td>{{ $atendimento->cliente->nome }}</td>

                            {{-- Profissional --}}
                            <td>{{ $atendimento->profissional?->name ?? '—' }}</td>

                            {{-- Serviços --}}
                            <td>
                                @foreach ($atendimento->servicos as $servico)
                                    <div class="small">
                                        <i class="bi bi-scissors me-1 text-warning"></i>
                                        {{ $servico->nome }} - R$ {{ number_format($servico->pivot->preco, 2, ',', '.') }}
                                    </div>
                                @endforeach
                            </td>

                            {{-- Produtos --}}
                            <td>
                                @forelse ($atendimento->produtos as $produto)
                                    <div class="small">
                                        <i class="bi bi-box me-1 text-warning"></i>
                                        {{ $produto->nome }} ({{ $produto->pivot->quantidade_usada }})
                                    </div>
                                @empty
                                    —
                                @endforelse
                            </td>

                            {{-- Data --}}
                            <td>{{ $atendimento->data->format('d/m/Y H:i') }}</td>

                            {{-- Valor pago --}}
                            <td>R$ {{ number_format($atendimento->valor_pago, 2, ',', '.') }}</td>

                            {{-- Ações --}}
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('atendimentos.edit', $atendimento) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $atendimento->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                {{-- Modal de Confirmação --}}
                                <x-modals.confirm-delete 
                                    id="modal-delete-{{ $atendimento->id }}"
                                    route="{{ route('atendimentos.destroy', $atendimento) }}"
                                    item="o atendimento de {{ $atendimento->cliente->nome }}"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="7" message="Nenhum atendimento registrado." />
                    @endforelse
                </x-tables.table>

                {{-- Paginação --}}
                {{ $atendimentos->links('components.buttons.pagination-button') }}
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
