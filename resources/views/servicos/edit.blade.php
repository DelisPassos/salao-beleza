<x-app-layout>
    <x-layout.header title="Editar Serviço" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>
                <x-forms.form 
                    :action="route('servicos.update', $servico)" 
                    :cancelRoute="route('servicos.index')" 
                    method="POST">
                    @method('PUT')

                    <x-forms.input-with-icon
                        id="nome"
                        name="nome"
                        icon="scissors"
                        value="{{ old('nome', $servico->nome) }}"
                        :error="$errors->first('nome')"
                    />

                    <x-forms.input-with-icon
                        id="descricao"
                        name="descricao"
                        icon="card-text"
                        value="{{ old('descricao', $servico->descricao) }}"
                        :error="$errors->first('descricao')"
                    />

                    <x-forms.input-with-icon
                        id="preco"
                        name="preco"
                        icon="currency-dollar"
                        value="{{ old('preco', $servico->preco) }}"
                        :error="$errors->first('preco')"
                    />

                </x-forms.form>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
