<x-app-layout>
    <x-layout.header :title="'Cadastrar Novo Cliente'" />

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
                <x-forms.form :action="route('clientes.store')" :cancelRoute="route('clientes.index')">
                    <x-forms.input-with-icon 
                        id="nome" 
                        name="nome" 
                        icon="person-fill" 
                        value="{{ old('nome') }}" 
                        error="{{ $errors->first('nome') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="email" 
                        name="email" 
                        icon="envelope-fill" 
                        value="{{ old('email') }}" 
                        error="{{ $errors->first('email') }}" 
                    />

                    <x-forms.input-with-icon 
                        id="telefone" 
                        name="telefone" 
                        icon="telephone-fill" 
                        value="{{ old('telefone') }}" 
                        error="{{ $errors->first('telefone') }}" 
                    />
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
