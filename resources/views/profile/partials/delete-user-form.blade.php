<section class="py-4">
    <header>
        <h2 class="h5 fw-semibold text-warning">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-2 text-white-50 small">
            {{ __('Uma vez que sua conta for excluída, todos os seus dados serão apagados permanentemente. Faça o download de qualquer informação que deseje manter antes de prosseguir.') }}
        </p>
    </header>

    {{-- Botão Excluir --}}
    <x-buttons.delete-button 
        data-bs-toggle="modal" 
        data-bs-target="#modal-delete-{{ $user->id }}">
            Excluir
    </x-buttons.delete-button>

    {{-- Modal de confirmação --}}
    <x-modals.confirm-delete
        id="modal-delete-{{ $user->id }}"
        route="{{ route('profile.destroy', $user) }}"
        :item="$user->nome"
    >
        <div class="mt-3">
            <x-forms.input-label for="password" :value="__('Senha')" class="visually-hidden" />

            <x-forms.text-input
                id="password"
                name="password"
                type="password"
                placeholder="Informe sua senha para confirmar"
                class="form-control bg-black text-white border-warning"
            />

            <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-warning" />
        </div>
    </x-modals.confirm-delete>
</section>
