<x-app-layout>
    <x-layout.header title="Editar Atendimento" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Formulário de edição --}}
                <x-forms.form :action="route('atendimentos.update', $atendimento)" :cancelRoute="route('atendimentos.index')">
                    @method('PUT')

                    <div class="row">
                        {{-- Cliente --}}
                        <div class="col-md-6">
                            <x-forms.input-label for="cliente_id" value="Cliente" />
                            <select name="cliente_id" id="cliente_id" class="form-select bg-black text-white border-warning">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $atendimento->cliente_id) == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <x-forms.input-error :messages="$errors->get('cliente_id')" class="mt-2 text-warning" />
                        </div>

                        {{-- Serviço --}}
                        <div class="col-md-6">
                            <x-forms.input-label for="servico_id" value="Serviço" />
                            <select name="servico_id" id="servico_id" class="form-select bg-black text-white border-warning">
                                @foreach ($servicos as $servico)
                                    <option value="{{ $servico->id }}" {{ old('servico_id', $atendimento->servico_id) == $servico->id ? 'selected' : '' }}>
                                        {{ $servico->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <x-forms.input-error :messages="$errors->get('servico_id')" class="mt-2 text-warning" />
                        </div>
                    </div>

                    {{-- Data --}}
                    <x-forms.input-with-icon
                        id="data"
                        name="data"
                        icon="calendar-event"
                        value="{{ old('data', $atendimento->data->format('Y-m-d\TH:i')) }}"
                        :error="$errors->first('data')"
                    />

                    {{-- Valor Pago --}}
                    <x-forms.input-with-icon
                        id="valor_pago"
                        name="valor_pago"
                        icon="cash-coin"
                        value="{{ old('valor_pago', $atendimento->valor_pago) }}"
                        :error="$errors->first('valor_pago')"
                    />
                </x-forms.form>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
