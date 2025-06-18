<x-app-layout>
    <x-header :title="'Cadastrar Novo Cliente'" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0">
                <div class="card-body">

                    {{-- Exibe erros de validação --}}
                    @if ($errors->any())
                        <x-alert type="danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-alert>
                    @endif

                    <x-form :action="route('clientes.store')" :cancelRoute="route('clientes.index')">
                        <x-input-with-icon id="nome" name="nome" icon="person-fill" value="{{ old('nome') }}" error="{{ $errors->first('nome') }}" />
                        <x-input-with-icon id="email" name="email" icon="envelope-fill" value="{{ old('email') }}" error="{{ $errors->first('email') }}" />
                        <x-input-with-icon id="telefone" name="telefone" icon="telephone-fill" value="{{ old('telefone') }}" error="{{ $errors->first('telefone') }}" />
                    </x-form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
