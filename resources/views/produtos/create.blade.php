<x-app-layout>
    <x-layout.header :title="'Cadastrar Novo Produto'" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Exibe erros de validação --}}
                @if ($errors->any())
                    <x-alerts.alert type="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alerts.alert>
                @endif

                {{-- Formulário --}}
                <x-forms.form :action="route('produtos.store')" :cancelRoute="route('produtos.index')">

                    <x-forms.input-with-icon 
                        id="nome" 
                        name="nome" 
                        icon="box-seam" 
                        value="{{ old('nome') }}" 
                        error="{{ $errors->first('nome') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="descricao" 
                        name="descricao" 
                        icon="card-text" 
                        value="{{ old('descricao') }}" 
                        error="{{ $errors->first('descricao') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="quantidade" 
                        name="quantidade" 
                        icon="123" 
                        type="number" 
                        min="0"
                        value="{{ old('quantidade') }}" 
                        error="{{ $errors->first('quantidade') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="volume" 
                        name="volume" 
                        icon="droplet" 
                        value="{{ old('volume') }}" 
                        error="{{ $errors->first('volume') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="preco" 
                        name="preco" 
                        icon="currency-dollar" 
                        type="number" 
                        step="0.01" 
                        min="0"
                        value="{{ old('preco') }}" 
                        error="{{ $errors->first('preco') }}" 
                    />

                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
