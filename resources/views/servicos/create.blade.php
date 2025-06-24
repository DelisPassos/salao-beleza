<x-app-layout>
    <x-layout.header title="Novo Serviço" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Alerta de erros --}}
                @if ($errors->any())
                    <x-alerts.alert type="danger" class="mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alerts.alert>
                @endif

                {{-- Formulário --}}
                <x-forms.form :action="route('servicos.store')" :cancelRoute="route('servicos.index')">
                    {{-- Nome --}}
                    <x-forms.input-with-icon
                        id="nome"
                        name="nome"
                        icon="scissors"
                        value="{{ old('nome') }}"
                        :error="$errors->first('nome')"
                    />

                    {{-- Descrição --}}
                    <x-forms.input-with-icon
                        id="descricao"
                        name="descricao"
                        icon="card-text"
                        value="{{ old('descricao') }}"
                        :error="$errors->first('descricao')"
                    />

                    {{-- Preço --}}
                    <x-forms.input-with-icon
                        id="preco"
                        name="preco"
                        icon="currency-dollar"
                        type="number"
                        step="0.01"
                        min="0"
                        value="{{ old('preco') }}"
                        :error="$errors->first('preco')"
                    />
                </x-forms.form>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
