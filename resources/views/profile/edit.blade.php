<x-app-layout>
    <x-layout.header title="Perfil" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        {{-- Seção: Informações do Perfil --}}
                        <div class="card mb-4 bg-dark bg-opacity-75 text-white shadow-lg border-warning rounded-3">
                            <div class="card-body p-4">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        {{-- Seção: Alterar Senha --}}
                        <div class="card mb-4 bg-dark bg-opacity-75 text-white shadow-lg border-warning rounded-3">
                            <div class="card-body p-4">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        {{-- Seção: Excluir Conta --}}
                        <div class="card mb-0 bg-dark bg-opacity-75 text-white shadow-lg border-warning rounded-3">
                            <div class="card-body p-4">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
