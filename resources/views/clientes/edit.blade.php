<x-app-layout>
    <x-header :title="'Editar Cliente'" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0">
                <div class="card-body">
                    <x-form :action="route('clientes.update', $cliente)" :cancelRoute="route('clientes.index')">
                        @method('PUT')

                        <x-input-with-icon
                            id="nome"
                            name="nome"
                            icon="person"
                            :value="old('nome', $cliente->nome)"
                            :error="$errors->first('nome')"
                        />

                        <x-input-with-icon
                            id="email"
                            name="email"
                            icon="envelope"
                            :value="old('email', $cliente->email)"
                            :error="$errors->first('email')"
                        />

                        <x-input-with-icon
                            id="telefone"
                            name="telefone"
                            icon="telephone"
                            :value="old('telefone', $cliente->telefone)"
                            :error="$errors->first('telefone')"
                        />
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
