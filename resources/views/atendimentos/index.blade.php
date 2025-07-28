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

                {{-- TABELA para md+ --}}
                <div class="d-none d-md-block">
                    <x-tables.table :headers="['Cliente', 'Profissional', 'Serviços', 'Produtos', 'Data', 'Valor', 'Ações']">
                        @forelse($atendimentos as $atendimento)
                            <tr>
                                <td>{{ $atendimento->cliente->nome }}</td>
                                <td>{{ $atendimento->profissional?->name ?? '—' }}</td>
                                <td>
                                    @foreach ($atendimento->servicos as $servico)
                                        <div>
                                            {{ $servico->nome }} 
                                            <span class="small text-white-50">
                                                — R$ {{ number_format($servico->pivot->preco, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($atendimento->produtos as $produto)
                                        <div>
                                            {{ $produto->nome }}
                                            <span class="small text-white-50">
                                                ({{ $produto->pivot->quantidade_usada }})
                                            </span>
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ $atendimento->data->format('d/m/Y H:i') }}</td>
                                <td>R$ {{ number_format($atendimento->valor_pago, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <x-tables.actions 
                                        :editRoute="route('atendimentos.edit', $atendimento)"
                                        :deleteRoute="route('atendimentos.destroy', $atendimento)"
                                        :modalId="'modal-delete-' . $atendimento->id"
                                        :itemName="'o atendimento de ' . $atendimento->cliente->nome"
                                    />
                                </td>
                            </tr>
                        @empty
                            <x-tables.table-empty colspan="7" message="Nenhum atendimento registrado." />
                        @endforelse
                    </x-tables.table>
                </div>

                {{-- CARDS para sm --}}
                <div class="d-block d-md-none">
                    <x-tables.card-view 
                        :items="$atendimentos"
                        :fields="[
                            'Cliente' => fn($a) => $a->cliente->nome,
                            'Profissional' => fn($a) => $a->profissional?->name ?? '—',
                            'Serviços' => fn($a) => $a->servicos->map(fn($s) => $s->nome . ' (R$ ' . number_format($s->pivot->preco, 2, ',', '.') . ')')->join(', '),
                            'Produtos' => fn($a) => $a->produtos->map(fn($p) => $p->nome . ' (' . $p->pivot->quantidade_usada . ')')->join(', '),
                            'Data' => fn($a) => $a->data->format('d/m/Y H:i'),
                            'Valor' => fn($a) => 'R$ ' . number_format($a->valor_pago, 2, ',', '.'),
                        ]"
                        :actions="fn($a) => view('components.tables.actions', [
                            'editRoute' => route('atendimentos.edit', $a),
                            'deleteRoute' => route('atendimentos.destroy', $a),
                            'modalId' => 'modal-delete-' . $a->id,
                            'itemName' => 'o atendimento de ' . $a->cliente->nome,
                        ])->render()"
                    />
                </div>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $atendimentos->links('components.buttons.pagination-button') }}
                </div>
            </x-cards.card-t-privado>

            {{-- Modais de confirmação --}}
            @foreach ($atendimentos as $atendimento)
                <x-modals.confirm-delete 
                    :id="'modal-delete-' . $atendimento->id"
                    :route="route('atendimentos.destroy', $atendimento)"
                    :item="'o atendimento de ' . $atendimento->cliente->nome"
                />
            @endforeach
        </div>
    </div>
</x-app-layout>
